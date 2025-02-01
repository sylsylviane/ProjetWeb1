<?php
namespace App\Controllers;
use App\Providers\View;
use App\Providers\Auth;
use App\Models\Pays;
use App\Models\Condition;
use App\Models\Couleur;
use App\Providers\Validator;
use App\Models\Timbre;
use App\Models\Image;
use App\Models\Enchere;

class TimbreController
{ 
    // //Vérifie l'authentification dans le constructeur de UserController, garantissant qu'aucune des méthodes de TimbreController n'est accessible sans authentification.
    public function __construct()
    {
        Auth::session();
    }   
    
    public function index()
    {
        return View::render('timbre/index');
    }

    public function create(){
        $paysModel = new Pays;
        $pays = $paysModel->select('nom');

        $condition = new Condition;
        $conditions = $condition->select('nom');

        $couleur = new Couleur;
        $couleurs = $couleur->select('nom');
        if ($pays && $conditions) {
            return View::render('timbre/create', ['pays' => $pays, 'conditions' => $conditions, 'couleurs' => $couleurs]);
        } else {
            return View::render('error');
        }
    }

    public function store($data){
        $validator = new Validator;
        $validator->field('nom', $data['nom'])->required();
        $validator->field('date', $data['date'])->required();
        $validator->field('tirage', $data['tirage'])->required();
        $validator->field('dimension', $data['dimension'])->required();
        $validator->field('certification', $data['certification'])->required();
        $validator->field('description', $data['description'])->required();
        $validator->field('couleur_id', $data['couleur_id'], 'Couleur')->required();
        $validator->field('pays_id', $data['pays_id'], 'Pays')->required();
        $validator->field('condition_id', $data['condition_id'], 'Condition')->required();

        if ($validator->isSuccess()){
            $timbre = new Timbre;
            $data['membre_id'] = $_SESSION['user_id'];

            $insert = $timbre->insert($data);

            if ($insert){
                return View::redirect('timbre/upload-img?id='.$insert);
            } else {
                return View::render('error');
                
            }
            
        }else{
            $errors = $validator->getErrors();
            $paysModel = new Pays;
            $pays = $paysModel->select('nom');

            $condition = new Condition;
            $conditions = $condition->select('nom');

            $couleur = new Couleur;
            $couleurs = $couleur->select('nom');

            return View::render('timbre/create', ['errors' => $errors, 'inputs' => $data, 'pays' => $pays, 'conditions' => $conditions, 'couleurs' => $couleurs]);
        }
    }

    public function show(){

            $timbre = new Timbre;
            $timbres = $timbre->selectByField('membre_id', $_SESSION['user_id']);

            $paysModel = new Pays;
            $pays = $paysModel->select('nom');

            $condition = new Condition;
            $conditions = $condition->select('nom');

            $couleur = new Couleur;
            $couleurs = $couleur->select('nom');

            $image = new Image;
            $images = $image->select('timbre_id');

            if ($timbres){
                return View::render('timbre/show', ['timbres' => $timbres, 'conditions' => $conditions, 'couleurs' => $couleurs, 'images' => $images, 'pays' => $pays]);
            } else {
                return View::render('timbre/show', ['msg' => 'Vous n\'avez aucun timbre.']);
            }
    }

    public function edit($data = [])
    {

        if (isset($data['id']) && $data['id'] != null) {
            $timbre = new Timbre;
            $selectId = $timbre->selectId($data['id']);
            if ($selectId) {
                $paysModel = new Pays;
                $pays = $paysModel->select('nom');

                $condition = new Condition;
                $conditions = $condition->select('nom');

                $couleur = new Couleur;
                $couleurs = $couleur->select('nom');

                $image = new Image;
                $images = $image->select('timbre_id');

                return View::render('timbre/edit', ['pays' => $pays, 'inputs' => $selectId, 'conditions' => $conditions, 'couleurs' => $couleurs, 'images' => $images ]);
            } else {
                return View::render('error');
            }
        }
        return View::render('login');
    }

    public function update($data = [], $get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('nom', $data['nom'])->required();
            $validator->field('date', $data['date'])->min(4)->max(4)->required();
            $validator->field('tirage', $data['tirage'])->required();
            $validator->field('dimension', $data['dimension'])->required();
            $validator->field('certification', $data['certification'])->required();
            $validator->field('description', $data['description'])->required();
            $validator->field('couleur_id', $data['couleur_id'], 'Couleur')->required();
            $validator->field('pays_id', $data['pays_id'], 'Pays')->required();
            $validator->field('condition_id', $data['condition_id'], 'Condition')->required();

            if ($validator->isSuccess()) {
                $timbre = new Timbre;
                $update = $timbre->update($data, $get['id']);
                if ($update) {
                    return View::redirect('timbre/upload-img?id='.$get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                $paysModel = new Pays;
                $pays = $paysModel->select('nom');

                $condition = new Condition;
                $conditions = $condition->select('nom');

                $couleur = new Couleur;
                $couleurs = $couleur->select('nom');

                return View::render('timbre/edit', ['errors' => $errors, 'inputs' => $data, 'pays' => $pays, 'conditions' => $conditions, 'couleurs' => $couleurs]);
            }
        }
        return View::render('error');
    }

    //Méthode pour supprimer les timbres, les images et les enchères associées
    TODO: //EMPECHER LA SUPPRESSION D'UN TIMBRE SI UNE ENCHÈRE EST ACTIVÉE
    public function deleteTimbreImages($data)
    {
        $image = new Image;
        $imagesData = $image->selectByField('timbre_id', $data['id']);

        if ($imagesData) {

            foreach ($imagesData as $imageData){
                // Construire le chemin du fichier
                $filePath = 'public/uploads/' . $imageData['image_url'];
 
                // Supprimer le fichier si il existe
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $image->delete($imageData['id']);
            }
        }
        //Supprimer timbre 
        $timbre = new Timbre;
        $deleteTimbre = $timbre->delete($data['id']);
        if ($deleteTimbre){
            $enchere = new Enchere;
            $enchereData = $enchere->selectByField('timbre_id', $data['id']);
            if ($enchereData){

                $enchere->delete($enchereData[0]['id']);
                return View::redirect('timbre/show');
            }else{
                return View::redirect('timbre/show');
            }
        }else{
            return View::render('error');
        }
    }
}