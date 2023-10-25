<?php
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Client.php';

try {
    $errors = [];
    $currentDate = date('Y-m-d'); // Format de date YYYY-MM-DD
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        //récupération et validation du nom du client
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $errors['lastname'] = 'Veuillez obligatoirement entrer votre nom';
        } else {
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_LASTNAME . '/')));
            if ($isOk == false) {
                $errors['lastname'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation du prénom du client
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $errors['firstname'] = 'Veuillez obligatoirement entrer votre prénom';
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_FIRSTNAME . '/')));
            if ($isOk == false) {
                $errors['firstname'] = 'Ce champs n\'est pas valide';
            }
        }
        // récupération et validation de l'email du client
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL,); //nettoie la chaine de caractère de l'email
        if (empty($email)) {
            $errors['email'] = 'Veuillez obligatoirement entrer un email';
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL); //renvoi l'email ou false
            if ($isOk === false) {
                $errors['email'] = 'l\'email n\'est pas bon';
            }
        }
        //récupération et validation de la date de naissance
        $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT);
        $birthday = $_POST["birthday"];
        if (empty($birthday)) {
            $errors['birthday'] = 'Veuillez obligatoirement entrer une date de naissance.';
        } elseif ($birthday >= $currentDate) {
            $errors['birthday'] = 'Veuillez entrer une date de naissance valide.';
        } else {
        }
        //récupération et validation du numéro de téléphone
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $errors['phone'] = 'Veuillez obligatoirement entrer votre prénom';
        } else {
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_PHONE . '/')));
            if ($isOk == false) {
                $errors['phone'] = 'Ce champs n\'est pas valide';
            }
        }
        //récupération et validation du code postal
        $zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_NUMBER_INT);
        if (empty($zipCode)) {
            $errors['zipCode'] = 'Veuillez entrer un code postal';
        } else {
            $isOk = filter_var($zipCode, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_ZIPCODE . '/')));
            if ($isOk == false) {
                $errors['zipCode'] = 'Le code postal n\'est pas valide';
            }
        }
        //récupération et validation de la date du début de réservation
        $startdate = filter_input(INPUT_POST, 'startdate', FILTER_SANITIZE_NUMBER_INT);
        $startdate = $_POST["startdate"];
        if (empty($startdate)) {
            $errors['startdate'] = 'Veuillez obligatoirement entrer une date de réservation.';
        } elseif ($startdate <= $currentDate) {
            $errors['startdate'] = 'Veuillez entrer une date valide.';
        } else {
        }
        //récupération et validation de la date de fin de réservation
        $enddate = filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_NUMBER_INT);
        $enddate = $_POST["enddate"];
        if (empty($enddate)) {
            $errors['enddate'] = 'Veuillez obligatoirement entrer une date de fin de réservation.';
        } elseif ($enddate <= $currentDate) {
            $errors['enddate'] = 'Veuillez entrer une date valide.';
        } else {
        }
        //récupération et validation du pays de naissance
        // $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        // if (empty($city)) {
        //     $errors['city'] = 'Veuillez obligatoirement entrer un pays de naissance';
        // } else {
        //     if ((in_array($city, COUNTRIES)) == false) {
        //         $errors['city'] = 'Veuillez selectionner votre pays de naissance';
        //     }
        // }

        
        if (empty($errors)) {
            $newClient = new Client();
            //nouvel instance de l'objet issu de la classe Vehicle
            //on hydrate l'objet de toute les propriété
            $newClient->setLastname($lastname);
            $newClient->setFirstname($firstname);
            $newClient->setEmail($email);
            $newClient->setBirthday($birthday);
            $newClient->setPhone($phone);
            $newClient->setZipcode($zipCode);
            //on hydrate l'objet de toute les propriété
            $saved = $newClient->insert();
            //$saved -> réponse de la méthode en question -> ici retourne un booléen
        }
    }
} catch (\Throwable $th) {
}



include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/rent.php';
include __DIR__ . '/../views/templates/footer.php';
