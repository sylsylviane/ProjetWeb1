<?php

namespace App\Controllers;
use App\Providers\Auth;
use App\Models\Mise;
use App\Providers\View;
use App\Providers\Validator;

class MiseController{

    // //Vérifie l'authentification dans le constructeur de UserController, garantissant qu'aucune des méthodes de TimbreController n'est accessible sans authentification.
    public function __construct()
    {
        Auth::session();
    }   

    public function miser($data){
        //valider que le montant inscrit correspond à un nombre
        //récupérer le montant de la dernière mise qui sera la mise actuelle
        $mise = new Mise;
        $miseActuelle = $mise->getLast('enchere_id', $_GET['id']);
        // var_dump($miseActuelle);
        // die();
        $validator = new Validator;
        $validator->field('montant', $data['montant'])->number()->required();

        $selectId = $mise->selectByField('enchere_id', $_GET['id']);
        // var_dump($selectId);

        //Si l'enchere_id n'est pas présente dans la table mise, on insère la mise
        if (!$selectId && $validator->isSuccess()){
            $data['membre_id'] = $_SESSION['user_id'];
            $data['enchere_id'] = $_GET['id'];
            $data['offre_actuelle'] = 'oui';
            $insert = $mise->insert($data);
            TODO: //on update le champ offre_actuelle à oui
            if ($insert) {
                return View::render('mise-acceptee', ['msg' => 'Bravo ! Votre mise a bien été reçue. Nous communiquerons avec vous par courriel si vous êtes le gagnant de cette enchère. ']);
             } else {
                 return View::render('error', ['msg' => 'Désolé ! Une erreur est survenue. Veuillez réessayer à nouveau.']);
             }
        }
        // si l'enchere_id est présente, que la validation est ok et que le montant est plus élevé que la mise actuelle
        if($selectId && $validator->isSuccess() && $data['montant'] > $miseActuelle['montant']){
            $mise->updateField('offre_actuelle', 'non', 'enchere_id', $_GET['id']);
            $data['membre_id'] = $_SESSION['user_id'];
            $data['enchere_id'] = $_GET['id'];
            $data['offre_actuelle'] = 'oui';

            $insert = $mise->insert($data);
            //TODO: //on update le champ offre_actuelle de la nouvelle mise à oui et les autres à non
            if ($insert) {
                return View::render('mise-acceptee', ['msg' => 'Bravo ! Votre mise a bien été reçue. Nous communiquerons avec vous par courriel si vous êtes le gagnant de cette enchère. ']);
            } else {
                return View::render('error', ['msg' => 'Désolé ! Une erreur est survenue. Veuillez réessayer à nouveau.']);
            }
        }else{
            return View::render('mise-acceptee', ['msg' => 'Veuillez entrer un montant supérieur à l\'offre actuelle. ']);
        }         
    }
}