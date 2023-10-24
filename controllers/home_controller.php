<?php 
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../models/Vehicle.php';

try {   
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    //id_types: $id_types -> paramètre nominatif / càd qu'on a pas besoin d'appelé toutes les variables
    //défini en paramètre d'entrée, seulement ceux qui n'ont pas de paramètre par défaut
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    $search = intval(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
    //définit une valeur par défaut (1) si $page est vide 
    if (empty($page)){
        $page = 1;
    }
    $getVehicleList = Vehicle::get_all_vehicle(id_types: $id_types, search: $search, page: $page); 
    $totalVehicles = Vehicle::get_all_vehicle(id_types: $id_types, search: $search, countAll: true); 
    $nbVehicles = count($totalVehicles);
    $nbPages = ceil($nbVehicles / NB_PER_PAGE);
    //ceil permet d'arrondir au supérieur
    $getTypesList = Type::get_all();
} catch (\Throwable $th) {
    $error = $th->getMessage();

}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/footer.php';
