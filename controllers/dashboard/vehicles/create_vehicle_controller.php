<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Type.php';
//besoin de recupérer le model Type pour l'appel de la méthode get_all
require_once __DIR__ . '/../../../models/Vehicle.php';



try {
    $errors = [];
    //getTypesList permet de récupérer les catégories de la classe Type et les afficher dans le select
    $getTypesList = Type::get_all();
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        //récupération et validation de la marque du véhicule
        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($brand)) {
            $errors['brand'] = 'Veuillez obligatoirement entrer une marque de véhicule';
        } else {
            $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_BRAND . '/')));
            if ($isOk == false) {
                $errors['brand'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation du modèle du véhicule
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($model)) {
            $errors['model'] = 'Veuillez obligatoirement entrer un modèle du véhicule';
        } else {
            $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_MODEL . '/')));
            if ($isOk == false) {
                $errors['model'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation de l'immatriculation
        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($registration)) {
            $errors['registration'] = 'Veuillez obligatoirement entrer l\'immatriculation';
        } else {
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_REGISTRATION . '/')));
            if ($isOk == false) {
                $errors['registration'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation du kilométrage
        //intval vaut 0 au mini ou un chiffre positif
        $mileage = intval(filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT));
        if (empty($mileage)) {
            $errors['mileage'] = 'Veuillez obligatoirement entrer le kilométrage';
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_MILEAGE . '/')));
            if ($isOk == false) {
                $errors['mileage'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation de la catégorie par son ID
        $id_types = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));
        if (!Type::get($id_types)) {
            $errors['id_types'] = 'Catégorie inexistante';
        }
        // //récupération et validation de l'image de la voiture
        //$picture contient un tableau de 6 valeurs
        try {
            $vehiclePicture = $_FILES['picture'];
            if (empty($vehiclePicture)) {
                throw new Exception("Veuillez renseigner un fichier", 1);
            }
            if ($vehiclePicture['error'] != 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($vehiclePicture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                throw new Exception("Mauvaise extension de fichier", 3);
            }
            if ($vehiclePicture['size'] > FILE_SIZE) {
                throw new Exception("Taille du fichier dépassé", 4);
            }
            //permet de recup l'extension -> $extension contient png
            $extension = pathinfo($vehiclePicture['name'], PATHINFO_EXTENSION);
            //$fileName -> renomme le fichier, uniqid se base sur le timestamp donc id unique
            //et permet de récupérer le nom du fichier
            $fileName = uniqid('img_') . '.' . $extension;
            //$from contient le nom temporaire du fichier
            $from = $vehiclePicture['tmp_name'];
            $to = __DIR__ . '/../../../public/uploads/vehicles/' . $fileName;
            //déplace un fichier d'un endroit à un autre
            move_uploaded_file($from, $to);
        } catch (\Throwable $th) {
            $errors['picture'] = $th->getMessage();
        }
        if (empty($errors)) {
            $newVehicle = new Vehicle();
            //nouvel instance de l'objet issu de la classe Vehicle
            //on hydrate l'objet de toute les propriété
            $newVehicle->setBrand($brand);
            $newVehicle->setModel($model);
            $newVehicle->setRegistration($registration);
            $newVehicle->setMileage($mileage);
            $newVehicle->setId_types($id_types);
            //on hydrate l'objet de toute les propriété
            $newVehicle->setPicture($fileName);
            //ici on hydrate avec fileName -> car c'est le fichier généré
            $saved = $newVehicle->insert();
            //$saved -> réponse de la méthode en question -> ici retourne un booléen
        }
    }
} catch (\Throwable $th) {
    
}


include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicles/create_vehicle.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
