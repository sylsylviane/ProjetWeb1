<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Providers\View;
use App\Models\Image;
use App\Models\Timbre;
use App\Models\Mise;

class AccueilController
{
    public function index()
    {
        $enchere = new Enchere;
        $encheres = $enchere->getSixNewest();

        $timbre = new Timbre;
        $timbres = $timbre->select('nom');

        $image = new Image;
        $images = $image->select('timbre_id');

        $mise = new Mise;
        $mises = $mise->select('montant');

        if ($encheres) {
            return View::render('accueil', ['encheres' => $encheres, 'images' => $images, 'timbres' => $timbres, 'mises' => $mises]);
        } else {
            return View::render('error');
        }
    }
}
