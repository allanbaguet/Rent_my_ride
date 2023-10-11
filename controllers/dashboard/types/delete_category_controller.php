<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Type.php';

$errors = [];



$id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
//on récupère le paramètre d'URL qui a été prélablement nettoyer pour l'utiliser ensuite dans la méthode delete
$deleted = (int)Type::delete($id_types);
//(int) -> redirection de l'url en true ou false / 0 ou 1 donc entier
header('location: /controllers/dashboard/types/category_controller.php?delete=' . $deleted);
//ajout du paramètre d'url permettant de l'appelé dans 
die;


// include __DIR__ . '/../../../views/dashboard/templates/header.php';
// include __DIR__ . '/../../../views/dashboard/types/delete_category.php';
// include __DIR__ . '/../../../views/dashboard/templates/footer.php';