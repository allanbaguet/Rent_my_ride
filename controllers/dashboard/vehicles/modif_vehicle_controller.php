<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

$errors = [];

try {
    //intval -> permet de nettoyer un entier
    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $vehicleObj = Vehicle::get($id_vehicles);
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
        // $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);
        // if (empty($picture)) {
        //     $errors['picture'] = 'Veuillez obligatoirement entrer une marque de véhicule';
        // } else {
        //     $isOk = filter_var($picture, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_BRAND . '/')));
        //     if ($isOk == false) {
        //         $errors['picture'] = 'Ce champs n\'est pas valide';
        //     }          
        // }
        //récupération et validation de la catégorie
        $id_types = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($errors)) {
            $newVehicle = new Vehicle();
            $newVehicle->setBrand($brand);
            $newVehicle->setModel($model);
            $newVehicle->setRegistration($registration);
            $newVehicle->setMileage($mileage);
            $newVehicle->setId_types($id_types);
            // $newVehicle->setPicture($picture);
            // $saved = $newVehicle->update();
        }
    }
} catch (\Throwable $th) {
}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicles/modif_vehicle.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';