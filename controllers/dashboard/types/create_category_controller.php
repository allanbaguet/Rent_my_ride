<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Type.php';


$errors = [];

try {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        //récupération et validation de la catégorie
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez obligatoirement entrer une catégorie';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_TYPE . '/')));
            if ($isOk == false) {
                $errors['type'] = 'Ce champs n\'est pas valide';
            } else {
                //condition ciblant la classe Type, et stocké dans le tableau d'erreur nommée type, un message d'erreur
                //si l'interpreteur passe dans cette condition, donc tableau erreur non vide
                if (Type::isExist($type)) {
                    $errors['type'] = 'Catégorie déjà existante';
                }
            }
        }

        if (empty($errors)) {
            $newType = new Type();
            $newType->setType($type);
            $saved = $newType->insert();
        }



        // if ($saved == true) {
        //     //permet la redirection à la liste des catégories à la modification
        //     header('location: /controllers/dashboard/types/category_controller.php');
        // }
    }
} catch (\Throwable $th) {
    //throw $th;
}



include __DIR__ . '/../../../views/dashboard/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/create_category.php';
include __DIR__ . '/../../../views/dashboard/templates/footer.php';
