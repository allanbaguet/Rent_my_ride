<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Client.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $id_clients = intval(filter_input(INPUT_GET, 'id_clients', FILTER_SANITIZE_NUMBER_INT));
    $infoClient = filter_input(INPUT_GET, 'info', FILTER_SANITIZE_NUMBER_INT);
    $getClientList = Client::get($id_clients);
    $getVehicleClient = Rent::get_All();
    



} catch (\Throwable $th) {

}


include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/clients/info_clients.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';