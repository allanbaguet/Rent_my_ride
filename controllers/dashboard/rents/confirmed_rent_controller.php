<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Client.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../models/Vehicle.php';


$id_rents = intval(filter_input(INPUT_GET, 'id_rents', FILTER_SANITIZE_NUMBER_INT));
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

if ($action === 'confirm') {
    $confirm = (int)Rent::confirm($id_rents);
    //(int) -> redirection de l'url en true ou false / 1 ou 0 donc entier -> 1 si modif ou 0 erreur
    //si dans le param d'URL, archive est défini, donc condition passe dans la méthode archive par $archived
    header('location: /controllers/dashboard/rents/list_rents_controller.php?confirm=' . $confirm);
    die;
} else {
    header('location: /controllers/dashboard/rents/list_rents_controller.php');
    //renvois par défaut sur la liste des véhicules si pas passé par les conditons ci dessus
    die;
}


include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/rents/confirmed_rent.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
