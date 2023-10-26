<?php

require_once __DIR__ . '/../config/constante.php';

class Database {

    private static $pdo;

    public static function connect(){
        if(self::$pdo == null){
            try {
                self::$pdo = new PDO (database, user, password);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (Exception $error)
            {
                //affiche un message d'erreur si les données ne sont pas bonnes
                die('Erreur : ' . $error->getMessage());
            }
            var_dump(self::$pdo);
        }
        return self::$pdo;
    }
    

}

