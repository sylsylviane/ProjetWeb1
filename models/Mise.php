<?php

namespace App\Models;

use App\Models\CRUD;

class Mise extends CRUD
{
    protected $table = 'mise';
    protected $primaryKey = 'id';
    protected $fillable = ['date', 'montant', 'membre_id', 'enchere_id', 'offre_actuelle'];
}
