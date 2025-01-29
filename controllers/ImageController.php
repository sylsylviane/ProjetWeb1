<?php

namespace App\Controllers;

use App\Models\Image;
use App\Providers\View;

class ImageController
{

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
                $insert = $image->insert(['image_url' => $imageUrl, 'timbre_id' => $_GET['id']]);

                if ($insert) {
                    $image = new Image;
                    $images = $image->selectByField('timbre_id', $_GET['id']);
                    return View::render('timbre/upload-img', ['images' => $images, 'msg' => 'Bravo, votre fichier a bien été téléchargé.']);
                }
            } else {
                return View::render('error');
            }
        }
    }
}
