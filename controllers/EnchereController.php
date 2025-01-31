<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\Enchere;
use App\Models\Image;
use App\Models\Timbre;
use App\Models\Condition;
use App\Models\Couleur;
use App\Models\Pays;

class EnchereController
{
    public function index()
    {
        return View::render('portail-encheres');
    }

    public function showPortailEncheres()
    {
        $enchere = new Enchere;
        $encheres = $enchere->select('id');

        $image = new Image;
        $images = $image->select('timbre_id');

        $timbre = new Timbre;
        $timbres = $timbre->select('nom');

        $condition = new Condition;
        $conditions = $condition->select('nom');
        
        if ($encheres) {
            return View::render('portail-encheres', ['encheres' => $encheres, 'images' => $images, 'timbres' => $timbres, 'conditions' => $conditions]);
        } else {
            return View::render('error');
        }
    }

    public function showEnchere(){

            $enchere = new Enchere;
            $encheres = $enchere->selectByField('timbre_id', $_GET['id']);

            $timbre = new Timbre;
            $timbres = $timbre->select('nom');

            $image = new Image;
            $images = $image->select('timbre_id');

            $condition = new Condition;
            $conditions = $condition->select('nom');

            $paysModel = new Pays;
            $pays = $paysModel->select('nom');

            $couleur = new Couleur;
            $couleurs = $couleur->select('nom');

            if ($timbres) {
                return View::render('enchere', ['encheres' => $encheres, 'images' => $images, 'timbres' => $timbres, 'conditions' => $conditions, 'pays' => $pays, 'couleurs' => $couleurs]);
            } else {
                return View::render('error');
            }
        }
}
