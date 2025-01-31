<?php

namespace App\Controllers;

use App\Models\Enchere;
use App\Providers\View;
use App\Models\Image;
use App\Models\Timbre;

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

        if ($encheres) {
            return View::render('accueil', ['encheres' => $encheres, 'images' => $images, 'timbres' => $timbres]);
        } else {
            return View::render('error');
        }
    }
}
