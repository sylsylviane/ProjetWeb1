<?php

namespace App\Controllers;

use App\Models\Timbre;
use App\Providers\View;
use App\Models\Condition;
use App\Models\Couleur;
use App\Models\Pays;
use App\Models\Image;

class AccueilController
{

    public function index()
    {
        $timbre = new Timbre;
        $timbres = $timbre->getSixNewest();

        $paysModel = new Pays;
        $pays = $paysModel->select('nom');

        $condition = new Condition;
        $conditions = $condition->select('nom');

        $couleur = new Couleur;
        $couleurs = $couleur->select('nom');

        $image = new Image;
        $images = $image->select('timbre_id');

        if ($timbres) {
            return View::render('accueil', ['timbres' => $timbres, 'pays' => $pays, 'conditions' => $conditions, 'couleurs' => $couleurs, 'images' => $images]);
        } else {
            return View::render('error');
        }
    }
}
