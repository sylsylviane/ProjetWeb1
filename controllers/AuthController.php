<?php

namespace App\Controllers;

use App\Models\Membre;
use App\Providers\View;
use App\Providers\Validator;

class AuthController
{

    public function index()
    {
        return View::render('login');
    }

    public function store($data)
    {
        $validator = new Validator;
        $validator->field('nom_utilisateur', $data['nom_utilisateur'], 'Le nom d\'utilisateur')->min(2)->max(50);
        $validator->field('mdp', $data['mdp'], 'Le mot de passe')->min(6)->max(20);

        if ($validator->isSuccess()) {
            $membre = new Membre;
            $checkuser = $membre->checkuser($data['nom_utilisateur'], $data['mdp']);

            if ($checkuser) {
                return View::redirect('accueil');
            } else {
                $errors['message'] = "Informations non valide";
                return View::render('login', ['errors' => $errors, 'inputs' => $data]);
            }
        } else {


            $errors = $validator->getErrors();
            return View::render('login', ['errors' => $errors, 'inputs' => $data]);
        }
    }

    public function delete()
    {
        session_destroy();
        TODO: //VALIDER LA REDIRECTION LOGIN OU
        return View::redirect('login'); 
    }
}
