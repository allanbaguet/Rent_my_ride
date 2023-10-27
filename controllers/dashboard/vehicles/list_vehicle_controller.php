<?php

require_once __DIR__ . '/../../../models/Vehicle.php';


try {
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    //variable order qui vaut soit asc soit desc, par defaut asc
    if ((empty($order) || $order != 'ASC') && $order != 'DESC') {
        $order = 'ASC';       
    } 
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $getVehicleList = Vehicle::get_all($order);    
    //variable qui appel la classe et sa méthode -> récupére les éléments archivé
    $getVehicleArchived = Vehicle::get_archive($order);
    $archive= filter_input(INPUT_GET, 'archive', FILTER_SANITIZE_NUMBER_INT);
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $unarchive = filter_input(INPUT_GET, 'unarchive', FILTER_SANITIZE_NUMBER_INT);
} catch (\Throwable $th) {

}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list_vehicle.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';