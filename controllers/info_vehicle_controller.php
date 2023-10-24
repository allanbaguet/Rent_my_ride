<?php 
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../models/Vehicle.php';

try {
    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    $getVehicleList = Vehicle::get($id_vehicles); 

    

} catch (\Throwable $th) {
    //throw $th;
}






include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/info_vehicle.php';
include __DIR__ . '/../views/templates/footer.php';