<?php

namespace App\Controllers;

use App\Models\Image;
use App\Providers\View;
use App\Providers\Auth;

class ImageController
{
    // //Vérifie l'authentification dans le constructeur de UserController, garantissant qu'aucune des méthodes de TimbreController n'est accessible sans authentification.
    public function __construct()
    {
        Auth::session();
    }   

    public function index()
    {
        $image = new Image;
        $images = $image->selectByField('timbre_id', $_GET['id']);
        return View::render('timbre/upload-img', ['images' => $images]);
    }

    public function uploadImage()
    {
        $target_dir = "public/uploads/"; //$target_dir = "uploads/" - spécifie le répertoire où le fichier va être placé

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //$target_file spécifie le chemin du fichier à télécharger
        $uploadOk = 1; //$uploadOk=1 n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //$imageFileType contient l'extension de fichier du fichier (en minuscules)

        // Ensuite, vérifiez si le fichier image est une image réelle ou une fausse image
        if (isset($_POST["submit"]) && isset($_GET['id']) && $_GET['id'] != null) {

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $image = new Image;
            $images = $image->selectByField('timbre_id', $_GET['id']);
            return View::render('timbre/upload-img', ['images' => $images, 'msg' => 'Ce fichier existe déjà.']);
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $image = new Image;
            $images = $image->selectByField('timbre_id', $_GET['id']);
            return View::render('timbre/upload-img', ['images' => $images, 'msg' => 'Ce fichier est trop volumineux.']);
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
            && $imageFileType != "webp"
        ) {

            $image = new Image;
            $images = $image->selectByField('timbre_id', $_GET['id']);
            return View::render('timbre/upload-img', ['images' => $images, 'msg' => 'Seul les fichiers JPG, JPEG, PNG, WEBP & GIF sont permis.']);
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $image = new Image;
            $images = $image->selectByField('timbre_id', $_GET['id']);
            return View::render('timbre/upload-img', ['images' => $images, 'msg' => 'Désolé, votre fichier n\'a pas pu être téléchargé.']);
        } else { // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $imageUrl = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                $image = new Image;
                //On insère l'image comme l'image principale
                $insert = $image->insert(['image_url' => $imageUrl, 'timbre_id' => $_GET['id'], 'image_princ' => 'non']); //retourne le id de l'image

                if ($insert) {
                    //On selectionne la première image 
                    $firstImg = $image->getFirst('timbre_id', $_GET['id']);

                    if ($firstImg) {
                        $image->updateField('image_princ', 'oui', 'id', $firstImg['id']);
                    }
                    $images = $image->selectByField('timbre_id', $_GET['id']); //retourne les images correspondant à l'id de l'url
                    return View::render('timbre/upload-img', ['images' => $images, 'msg' => 'Votre fichier a bien été téléchargé.']);
                }
            } else {
                return View::render('error');
            }
        }
    }

    public function deleteImage($data = [])
    {

        $get = $_GET['id'];
        $image = new Image;

        $imageData = $image->selectByField('id', $data['id']);

        if ($imageData) {
            // Construire le chemin du fichier
            $filePath = 'public/uploads/' . $imageData[0]['image_url'];

            // Supprimer le fichier si il existe
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $delete = $image->delete($data['id']);

            if ($delete) {
                $images = $image->selectByField('timbre_id', $_GET['id']);
                return View::redirect('timbre/upload-img?id=' . $get, ['images' => $images]);
            } else {
                return View::redirect('error');
            }
        } else {
            return View::redirect('error');
        }
    }
}
