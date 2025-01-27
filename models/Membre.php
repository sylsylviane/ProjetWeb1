<?php
namespace App\Models;
use App\Models\CRUD;

class Membre extends CRUD{
    protected $table = 'membre';
    protected $primaryKey = 'id';
    protected $fillable = ['prenom', 'nom_famille', 'nom_utilisateur', 'mdp', 'courriel', 'telephone', 'adresse', 'code_postal', 'ville', 'province','pays_id', 'token'];

    public function hashPassword ($password, $cost = 10){
        $options = ['cost'=>$cost];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function checkuser($username, $password)
    {
        $membre = $this->unique('nom_utilisateur', $username);
        if ($membre) {
            if (password_verify($password, $membre['mdp'])) {
                session_regenerate_id();
                $_SESSION['user_id'] = $membre['id']; 
                $_SESSION['user_name'] = $membre['prenom'];
                $_SESSION['finger_print'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']); 
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}