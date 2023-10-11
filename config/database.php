<?php

require_once __DIR__ . '/../config/constante.php';

function connect(){
    try {
        $pdo = new PDO (database, user, password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (Exception $error)
    {
        //affiche un message d'erreur si les données ne sont pas bonnes
        die('Erreur : ' . $error->getMessage());
    }
    return $pdo;
}
