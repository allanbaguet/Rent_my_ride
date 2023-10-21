<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';


$id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
//on récupère le paramètre d'URL qui a été prélablement nettoyer pour l'utiliser ensuite dans la méthode archive
if ($action === 'archive') {
    $archived = (int)Vehicle::archive($id_vehicles);
    //(int) -> redirection de l'url en true ou false / 1 ou 0 donc entier -> 1 si modif ou 0 erreur
    //si dans le param d'URL, archive est défini, donc condition passe dans la méthode archive par $archived
    header('location: /controllers/dashboard/vehicles/list_vehicle_controller.php?archive=' . $archived);
    die;
} elseif ($action === 'delete') {
    $deleted = (int)Vehicle::delete($id_vehicles);
    // if ($deleted) {
    //     //condition supplémentaire pour supprimer l'image si il y en as une
    //     $vehicleObj = Vehicle::get($id_vehicles);
    //     //besoin du nom de photo -> picture donc l'appel à la méthode ::get ou il y est stocké
    //     @unlink(__DIR__ . '/../../../public/uploads/vehicles/' . $vehicleObj->picture);
    // }
    //si dans le param d'URL, delete est défini, donc condition passe dans la méthode delete par $deleted
    header('location: /controllers/dashboard/vehicles/list_vehicle_controller.php?delete=' . $deleted);
    die;      
} elseif ($action === 'unarchive') {
    $unarchived = (int)Vehicle::unarchive($id_vehicles);
    //si dans le param d'URL, unarchive est défini, donc condition passe dans la méthode unarchive par $unarchived
    header('location: /controllers/dashboard/vehicles/list_vehicle_controller.php?unarchive=' . $unarchived);
    die;
} else {
    header('location: /controllers/dashboard/vehicles/list_vehicle_controller.php');
    //renvois par défaut sur la liste des véhicules si pas passé par les conditons ci dessus
    die;
}