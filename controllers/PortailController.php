<?php

namespace App\Controllers;

use App\Providers\View;

class PortailController
{
    public function index()
    {
        return View::render('portail-encheres');
    }
}
