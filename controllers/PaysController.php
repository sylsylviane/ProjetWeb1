<?php
namespace App\Controllers;  
use App\Providers\View;
use App\Models\Pays;

class PaysController{
    public function index()
    {
        $paysModel = new Pays;
        $pays = $paysModel->select('nom');
        if ($pays) {
            return View::render('pays/index', ['pays' => $pays]);
        } else {
            return View::render('error');
        }
    }
}