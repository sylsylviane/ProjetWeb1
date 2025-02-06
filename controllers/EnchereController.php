<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\Enchere;
use App\Models\Image;
use App\Models\Timbre;
use App\Models\Condition;
use App\Models\Couleur;
use App\Models\Pays;
use App\Models\Mise;

class EnchereController
{

    public function showAndFilterPortailEncheres($data = [])
    {
        $enchere = new Enchere;
        $image = new Image;
        $timbre = new Timbre;
        $condition = new Condition;
        $mise = new Mise;
        $paysModel = new Pays;
        $couleur = new Couleur;

        $encheres = $enchere->select('id');
        $images = $image->select('timbre_id');
        $timbres = $timbre->select('nom');
        $conditions = $condition->select('id');
        $pays = $paysModel->select('nom');
        $couleurs = $couleur->select('id');
        $mises = $mise->select('montant');

        if (isset($data) && $data != null) {

            $encheresFiltrees = [];

            // Filtrer par couleur
            if (isset($data['couleur_id']) && $data['couleur_id'] != null) {
                
                foreach ($data['couleur_id'] as $couleur_id) {
                    
                    //pour trouver les timbres associés à la couleur sélectionnées
                    $timbresFiltres = $timbre->selectByField('couleur_id', $couleur_id);

                    foreach ($timbresFiltres as $timbreFiltre) {
                        
                        //pour trouver l'enchère qui correspond à l'id des timbres filtrés
                        $encheresCouleur = $enchere->selectByField('timbre_id', $timbreFiltre['id']);

                        foreach ($encheresCouleur as $enchereFiltre) {
                            // contient les enchères qui ont été filtrées par couleur
                            $encheresFiltrees[] = $enchereFiltre;
                            
                        }
                    }
                }
            }

            // Filtrer par pays
            if (isset($data['pays_id']) && $data['pays_id'] != null) {

                $encheresPays = [];

                foreach ($data['pays_id'] as $pays_id) {

                    $timbresFiltres = $timbre->selectByField('pays_id', $pays_id);

                    foreach ($timbresFiltres as $timbreFiltre) {

                        $encheresTemp = $enchere->selectByField('timbre_id', $timbreFiltre['id']);

                        foreach ($encheresTemp as $enchereFiltre) {
                            $encheresPays[] = $enchereFiltre;
                        }
                        

                    }
                }
                // Filtrer les enchères par pays dans $encheresFiltrees
                $encheresFiltrees = array_filter($encheresFiltrees, function ($enchere) use ($encheresPays) {
                    foreach ($encheresPays as $encherePays) {

                        if ($enchere['id'] == $encherePays['id']) {
                            return true;

                        }
                    }
                    return false;
                });
            }

            // Filtrer par condition
            if (isset($data['condition_id']) && $data['condition_id'] != null) {

                $encheresCondition = [];

                foreach ($data['condition_id'] as $condition_id) {

                    $timbresFiltres = $timbre->selectByField('condition_id', $condition_id);

                    foreach ($timbresFiltres as $timbreFiltre) {

                        $encheresTemp = $enchere->selectByField('timbre_id', $timbreFiltre['id']);

                        foreach ($encheresTemp as $enchereFiltre) {

                            $encheresCondition[] = $enchereFiltre;

                        }
                    }
                }
                // Filtrer les enchères par condition dans $encheresFiltrees
                $encheresFiltrees = array_filter($encheresFiltrees, function ($enchere) use ($encheresCondition) {

                    foreach ($encheresCondition as $enchereCondition) {

                        if ($enchere['id'] == $enchereCondition['id']) {
                            
                            return true;
                        }
                    }
                    return false;
                });
            }

            // Si des enchères filtrées ont été trouvées
            if ($encheresFiltrees) {
                return View::render('portail-encheres', ['encheres' => $encheresFiltrees,'images' => $images,'timbres' => $timbres,'conditions' => $conditions,'pays' => $pays,'couleurs' => $couleurs,'mises' => $mises
                ]);
            } else {
                return View::render('portail-encheres', ['encheres' => $encheresFiltrees,'images' => $images,'timbres' => $timbres,'conditions' => $conditions,'pays' => $pays,'couleurs' => $couleurs,'mises' => $mises,'message' => 'Aucune enchère trouvée pour les critères sélectionnés.']);
            }
        } else {
            return View::render('portail-encheres', ['encheres' => $encheres,'images' => $images,'timbres' => $timbres,'conditions' => $conditions,'pays' => $pays,'couleurs' => $couleurs, 'mises' => $mises]);
        }
    }



    public function showEnchere($data = []){

            if (isset($data['id']) && $data['id'] != null){
                $enchere = new Enchere;
                $encheres = $enchere->selectByField('id', $_GET['id']);

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

                $mise = new Mise;
                $mises = $mise->select('montant');

                if ($timbres) {
                    return View::render('enchere', ['encheres' => $encheres, 'images' => $images, 'timbres' => $timbres, 'conditions' => $conditions, 'pays' => $pays, 'couleurs' => $couleurs, 'mises' => $mises]);
                } else {
                    return View::render('error');
                }
            }
            return View::render('error');          
        }
}
