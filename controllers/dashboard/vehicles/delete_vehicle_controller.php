<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';


$id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
//on récupère le paramètre d'URL qui a été prélablement nettoyer pour l'utiliser ensuite dans la méthode archive
if ($action === 'archive') {
    $archived = (int)Vehicle::archive($id_vehicles);
    //(int) -> redirection de l'url en true ou false / 0 ou 1 donc entier
    header('location: /controllers/dashboard/vehicles/list_vehicle_controller.php?archive=' . $archived);
} elseif ($action === 'delete') {
    $deleted = (int)Vehicle::delete($id_vehicles);
    //(int) -> redirection de l'url en true ou false / 0 ou 1 donc entier
    header('location: /controllers/dashboard/vehicles/list_vehicle_controller.php?delete=' . $deleted);
}
die;


include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicles/delete_vehicle.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';