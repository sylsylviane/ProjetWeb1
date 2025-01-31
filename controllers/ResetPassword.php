<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\Membre;

class ResetPassword
{
    public function index()
    {
        return View::render('resetpwd/forgot-password');
    }

    public function token() 
    {
        if (isset($_POST['email'])) { 
            $token = uniqid(); 

            $url = "http://localhost/projet/resetpwd/reset-password?token=" . $token; 

            $message = "Voici le lien pour la réinitialisation du mot de passe : " . $url; 

            $headers = 'Content-type: text/html; charset=utf-8';

            
            if (mail($_POST['email'], 'Mot de passe oublié', $message, $headers)) { 
                $membre = new Membre; 
                $tokenUpdate = $membre->updateField('token', $token, 'courriel', $_POST['email']);
                if ($tokenUpdate) { 

                    return View::render('resetpwd/email-send-successfully'); 
                } else {
                    return View::render('error');
                }
            } else {
                return View::render('error');
            }
        }
    }

    public function recuperationToken()
    {
        if (isset($_GET['token']) && $_GET['token'] != '') { 

            $membre = new Membre;
            $email = $membre->recoveryToken($_GET['token']);
            if ($email) { 
                return View::render('resetpwd/reset-password'); 
            } else {
                return View::render('error');
            }
        }else{
            return View::render('error');
        }
        }

        public function resetPassword(){
            if(isset($_POST['newPassword'])){ 
                $membre = new Membre; 
                $email = $membre->recoveryToken($_GET['token']); 
                $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                
                if($membre->updatePassword($hashedPassword, $email)){
                    return View::redirect('login'); 
                } else {
                    echo 'Erreur lors de la réinitialisation du mot de passe';
                }
            }
        }
    }

