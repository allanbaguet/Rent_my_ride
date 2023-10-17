<?php

require_once __DIR__ . '/../config/database.php';



class Type {
    //private correspond à la portée des attributs / $id_types est un attribut
    private int $id_types;
    private string $type;

    // public function __construct(int $id_types, string $type) {
    //     //méthode crée afin d'accéder aux attribut de la classe
    //     $this -> setIdTypes($id_types);
    //     $this -> setType($type);
    // }

    /**
     * méthode retournant la valeur des ID des catégories
     * @return int
     */
    public function getId_types(): int
    //récupération des valeurs de l'attribut / Getter / et un entier
    {
        return $this->id_types;
    }

    /**
     * méthode affectant la valeur des ID des catégories
     * @param int $id_types
     * 
     */
    public function setId_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    /**
     * méthode retournant la valeur des catégories
     * @return string
     */
    public function getType(): string
    //récupération des valeurs de l'attribut / Getter / et un entier
    {
        return $this->type;
    }

    /**
     * méthode affectant la valeur des ID des catégories
     * @param string $type
     * 
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `types` (`type`) VALUE (:type);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->getType(), PDO::PARAM_STR);
        $result = $sth->execute();
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }

    
    /**fonction permettant lister les catégories dans le select
     * @return array
     */
    //méthode static est accessible sans la création d'un objet
    public static function get_all(): array
    {
        $pdo = connect();
        $sql = 'SELECT `id_types`, `type` FROM `types` ORDER BY `type`;';
        $sth = $pdo->query($sql);
        $typeList = $sth->fetchAll();
        //fetchAll récupére tout les enregistrements -> fetchAll = tableau
        //sth -> statements handle
        return $typeList;
    }

    //méthode permettant de récuperer les infos du formulaire pour les modifiés ensuite
    public static function get(int $id_types): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `types` WHERE `id_types` = :id_types';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif 
        //PDO::PARAM_INT -> permet de typer la valeur de retour (ici en INT) par défaut en string
        $sth->execute();
        //la méthode execute retourne un booléen
        $result = $sth->fetch();
        //fetch récupére le premier enregistrement
        //sth -> statements handle
        return $result;
    }

    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `types` SET `type` = :type WHERE `id_types` = :id_types';
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':type', $this->getType(), PDO::PARAM_STR);
        $sth->bindValue(':id_types', $this->getId_types(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        return $sth->execute();
        //la méthode execute retourne un booléen
    }

    //public static ici car on ne manipule pas de donnée
    public static function delete(int $id_types): bool
    {
        $pdo = connect();
        $sql = 'DELETE FROM `types` WHERE `id_types` = :id_types';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }

    public static function isExist($type): bool
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `types` WHERE `type` = :type;';
        // fonction COUNT permet de compter le nombre d'enregistrement dans une table
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $type, PDO::PARAM_STR);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        $result = $sth->fetch();
        return (bool) $result;

        //la méthode execute retourne un booléen
        // $countCol = $sth->fetchColumn();
        // //fetchColumn retourne une seule colonne / retourne True si la colonne existe et inversement
        // return ($countCol > 0);
    }

}


