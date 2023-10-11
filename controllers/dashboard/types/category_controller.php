<?php
require_once __DIR__ . '/../../../models/Type.php';

try {
    //pour appelé la méthode static -> appel de la classe avec :: nom de la fonction
    $getTypesList = Type::get_all();
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer.php';
    die;
}


include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/category.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';