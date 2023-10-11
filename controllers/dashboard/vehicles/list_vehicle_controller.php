<?php

require_once __DIR__ . '/../../../models/Vehicle.php';


try {
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $getVehicleList = Vehicle::get_all();    
    // $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
} catch (\Throwable $th) {

}

include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicles/list_vehicle.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';