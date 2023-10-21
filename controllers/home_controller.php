<?php 
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../models/Vehicle.php';

try {   
    $getVehicleList = Vehicle::get_all_vehicle(); 
} catch (\Throwable $th) {
    $error = $th->getMessage();

}



include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
