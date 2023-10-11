<?php 
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/database.php';
require_once __DIR__ . '/../../../models/Type.php';



$errors = [];

try {
    //intval -> permet de nettoyer un entier
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    //$typeObj est un objet qui contient la réponse de la méthode
    $typeObj = Type::get($id_types);
    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        //récupération et validation de la catégorie
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez obligatoirement entrer une catégorie';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_TYPE . '/')));
            if ($isOk == false) {
                $errors['type'] = 'Ce champs n\'est pas valide';
            }
        }
        if (empty($errors)) {
            $newType = new Type();
            $newType->setType($type);
            $newType->setId_types($id_types);
            //setType / setId_types -> hydrate la variable
            $saved = $newType->update();
            //renvoi la réponse de la méthode issu de l'objet $newType, appartenant à la classe Type
            if ($saved == true) {
                //permet la redirection à la liste des catégories à la modification
                header('location: /controllers/dashboard/types/category_controller.php');
                die;
            }
        }
    }
} catch (\Throwable $th) {
    //throw $th;
}




include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/modif_category.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';