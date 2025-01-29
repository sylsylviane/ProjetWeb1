<?php

namespace App\Models;

use App\Models\CRUD;

class Timbre extends CRUD
{
    protected $table = 'timbre';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'date', 'tirage', 'dimension', 'certification', 'description', 'couleur_id', 'pays_id', 'condition_id', 'membre_id'];
}
