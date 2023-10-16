<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Type.php';

$errors = [];

try {
    //intval -> permet de nettoyer un entier
    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $vehicleObj = Vehicle::get($id_vehicles);
    $getTypesList = Type::get_all();
    // $saved = false;
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
        $mileage = filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT);
        if (empty($mileage)) {
            $errors['mileage'] = 'Veuillez obligatoirement entrer le kilométrage';
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_MILEAGE . '/')));
            if ($isOk == false) {
                $errors['mileage'] = 'Ce champs n\'est pas valide';
            }
        }
        // //récupération et validation de l'image de la voiture
        //$picture contient un tableau de 6 valeurs
        // if (isset($_FILES['picture']) && !empty($_FILES['picture']['name'])) {
            try {
                $picture = $_FILES['picture'];
                if (!in_array($picture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                    throw new Exception("Mauvaise extension de fichier", 1);
                }
                if ($picture['size'] >= FILE_SIZE) {
                    throw new Exception("Taille du fichier dépassé", 2);
                }
                //permet de recup l'extension -> $extension contient png
                $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
                //$from contient le nom temporaire du fichier
                $from = $picture['tmp_name'];
                //$fileName -> renomme le fichier, uniqid se base sur le timestamp donc id unique
                //et permet de récupérer le nom du fichier
                $fileName = uniqid('img_') . '.' . $extension;
                $to = __DIR__ . '/../../../public/uploads/vehicles/' . $fileName;
                //déplace un fichier d'un endroit à un autre
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $errors['picture'] = $th->getMessage();
            }
        } else {
            // Gérer le cas où aucun fichier n'a été téléchargé
            $errors['picture'] = "Aucun fichier n'a été téléchargé.";
        }
        //récupération et validation de la catégorie
        $id_types = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($errors)) {
            $newVehicle = new Vehicle();
            $newVehicle->setId_vehicles($id_vehicles);
            $newVehicle->setBrand($brand);
            $newVehicle->setModel($model);
            $newVehicle->setRegistration($registration);
            $newVehicle->setMileage($mileage);
            $newVehicle->setPicture($fileName);
            $newVehicle->setId_types($id_types);
            $saved = $newVehicle->update();
        } //renvoi la réponse de la méthode issu de l'objet $newType, appartenant à la classe Type
        if ($saved == true) {
            //permet la redirection à la liste des catégories à la modification
            header('location: /controllers/dashboard/vehicles/list_vehicle_controller.php');
            die;
        }
    
} catch (\Throwable $th) {
    var_dump($th);
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicles/modif_vehicle.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
