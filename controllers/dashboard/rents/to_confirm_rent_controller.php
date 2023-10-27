<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Client.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $getClientList = Client::get_all(); 
    $infoClient = filter_input(INPUT_GET, 'info', FILTER_SANITIZE_NUMBER_INT);
    

} catch (\Throwable $th) {

}


include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/rents/to_confirm_rent.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';