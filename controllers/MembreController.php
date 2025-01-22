<?php
namespace App\Controllers;

use App\Providers\Validator;
use App\Models\Membre;
use App\Providers\View;
use App\Models\Pays;

class MembreController
{

    public function create()
    {
        $paysModel = new Pays;
        $pays = $paysModel->select('nom');

        return View::render('membre/inscription', ['pays' => $pays]);
    }

    public function store($data){
        print_r($data);
        $validator = new Validator;
        $validator->field('prenom', $data['prenom'])->max(45)->required();
        $validator->field('nom_famille', $data['nom_famille'])->max(45)->required();
        $validator->field('nom_utilisateur', $data['nom_utilisateur'], 'Le nom d\'utilisateur')->max(100)->required()->unique('Membre');
        $validator->field('mdp', $data['mdp'], 'Le mot de passe')->min(6)->max(20);
        $validator->field('telephone', $data['telephone'], 'Le téléphone')->max(45);
        $validator->field('adresse', $data['adresse'], 'L\'adresse')->max(100);
        $validator->field('ville', $data['ville'], 'La ville')->max(50);
        $validator->field('province', $data['province'], 'La province')->max(50);
        $validator->field('code_postal', $data['code_postal'], 'Le code postal')->max(45);
        $validator->field('pays_id', $data['pays_id'], "Le pays")->number();

        if ($validator->isSuccess()){
            $membre = new Membre;
            $data['courriel'] = $data['nom_utilisateur'];
            $data['mdp'] = $membre->hashPassword($data['mdp']);

            $insert = $membre->insert($data);   

            if ($insert){
                return View::redirect('login');
            }else{
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            return View::render('membre/inscription', ['errors' => $errors, 'inputs' => $data]);
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $membre = new Membre;
            $selectId = $membre->selectId($data['id']);
            $paysModel = new Pays;
            $pays = $paysModel->select('nom');
            if ($selectId) {
                return View::render('membre/profil', ['membre' => $selectId, 'pays' => $pays]);
                // return View::render('membre/profil', ['membre' => $selectId]);

            } else {
                return View::render('error', ['msg' => 'Ce profil n\'existe pas']);
            }
        }
        return View::render('login');
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $membre = new Membre;
            $selectId = $membre->selectId($data['id']);
            if ($selectId) {
                $paysModel = new Pays;
                $pays = $paysModel->select('nom');
                return View::render('membre/edit', ['pays' => $pays, 'inputs' => $selectId]);
            } else {
                // *****************************
                return View::render('error');
            }
        }
        return View::render('error');
    }

    public function update($data = [], $get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('prenom', $data['prenom'])->max(45)->required();
            $validator->field('nom_famille', $data['nom_famille'])->max(45)->required();
            $validator->field('telephone', $data['telephone'], 'Le téléphone')->max(45);
            $validator->field('adresse', $data['adresse'], 'L\'adresse')->max(100);
            $validator->field('ville', $data['ville'], 'La ville')->max(50);
            $validator->field('province', $data['province'], 'La province')->max(50);
            $validator->field('code_postal', $data['code_postal'], 'Le code postal')->max(45);
            $validator->field('pays_id', $data['pays_id'], "Le pays")->number();

            if ($validator->isSuccess()) {
                $membre = new Membre;
                $update = $membre->update($data, $get['id']);
                if ($update) {
                    return View::redirect('membre/profil?id='.$get['id']);
                } else {
                    return View::render('error');
                }
            } else {
                $errors = $validator->getErrors();
                $paysModel = new Pays;
                $pays = $paysModel->select('nom');
                return View::render('membre/edit', ['errors' => $errors, 'inputs' => $data, 'pays' => $pays]);
            }
        }
        return View::render('error');
    }
}