<?php

require_once __DIR__ . '/../config/database.php';



class Vehicle {
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_vehicles;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture;
    //?string -> rend l'attribut null
    private DateTime $created_at;
    private string $updated_at;
    private ?string $deleted_at;
    private int $id_types;
    
    /**
     * méthode retournant la valeur des ID des véhicules
     * @return int
     */
    public function getId_vehicles(): int
    //récupération des valeurs de l'attribut / Getter / et un entier
    {
        return $this->id_vehicles;
    }

    /**
     * méthode affectant la valeur des ID des véhicules
     * @param int $id_types
     * 
     */
    public function setId_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

    /**
     * méthode retournant la valeur des marques de voiture
     * @return string
     */
    public function getBrand(): string
    //récupération des valeurs de l'attribut / Getter 
    {
        return $this->brand;
    }

    /**
     * méthode affectant la valeur des ID des marques de voiture
     * @param string $type
     * 
     */
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    /**
     * méthode retournant la valeur des modèle de voiture
     * @return string
     */
    public function getModel(): string
    //récupération des valeurs de l'attribut / Getter 
    {
        return $this->model;
    }

    /**
     * méthode affectant la valeur des ID des modèle de voiture
     * @param string $type
     * 
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * méthode retournant la valeur de l'immatriculation
     * @return string
     */
    public function getRegistration(): string
    //récupération des valeurs de l'attribut / Getter 
    {
        return $this->registration;
    }

    /**
     * méthode affectant la valeur des ID de l'immatriculation
     * @param string $type
     * 
     */
    public function setRegistration(string $registration)
    {
        $this->registration = $registration;
    }

    /**
     * méthode retournant la valeur du kilométrage
     * @return string
     */
    public function getMileage(): string
    //récupération des valeurs de l'attribut / Getter 
    {
        return $this->mileage;
    }

    /**
     * méthode affectant la valeur des ID du kilométrage
     * @param string $type
     * 
     */
    public function setMileage(string $mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     * méthode retournant la valeur de l'image
     * @return string
     */
    public function getPicture(): ?string
    //récupération des valeurs de l'attribut / Getter 
    {
        return $this->picture;
    }

    /**
     * méthode affectant la valeur des ID de l'image
     * @param string $type
     * 
     */
    public function setPicture(?string $picture)
    {
        $this->picture = $picture;
    }

    /**
     * méthode retournant la valeur des ID de la création du véhicule
     * DateTime est un objet
     * @return int
     */
    public function getCreated_At(): DateTime
    //récupération des valeurs de l'attribut / Getter / DateTime est un objet
    {
        return $this->created_at;
    }

    /**
     * méthode affectant la valeur des ID de la création du véhicule
     * @param int $id_types
     * 
     */
    public function setCreated_At(string $created_at)
    {
        $this->created_at = new DateTime($created_at);
    }

    /**
     * méthode retournant la valeur des ID de la modification du véhicule
     * @return int
     */
    public function getUpdated_At(): int
    //récupération des valeurs de l'attribut / Getter / et un entier
    {
        return $this->updated_at;
    }

    /**
     * méthode affectant la valeur des ID de la modification du véhicule
     * @param int $id_types
     * 
     */
    public function setUpdated_At(int $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * méthode retournant la valeur des ID de la suppression du véhicule
     * @return int
     */
    public function getDeleted_At(): ?string
    //récupération des valeurs de l'attribut / Getter / et un entier
    {
        return $this->deleted_at;
    }

    /**
     * méthode affectant la valeur des ID de la suppression du véhicule
     * @param int $id_types
     * 
     */
    public function setDeleted_At(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    
    /**
     * méthode retournant la valeur des ID de la catégorie du véhicule
     * @return int
     */
    public function getId_types(): int
    {
        return $this->id_types;
    }

    /**
     * méthode affectant la valeur des ID de la catégorie du véhicule
     * @param int $id_types
     * 
     */
    public function setId_types(int $id_types)
    {
        $this->id_types = $id_types;
    }



    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `vehicles` (`brand`, `model`, `registration`, `mileage`, `id_types`)
        VALUE (:brand, :model, :registration, :mileage, :id_types);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage());
        $sth->bindValue(':id_types', $this->getId_types(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif
        // $sth->bindValue(':picture', $this->getPicture());
        $result = $sth->execute();
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }

    //méthode static est accessible sans la création d'un objet
    public static function get_all(): array
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `vehicles`
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types` ORDER BY `types`.`type`, `vehicles`.`brand`, `vehicles`.`model`;';
        //requête SQL permettant de joindre la table vehicles et types, et de cibler leur colonne en commun
        //qui est id_types
        $sth = $pdo->query($sql);
        $vehicleList = $sth->fetchAll();
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $vehicleList;
    }


    //méthode permettant de récuperer les infos du formulaire pour les modifiés ensuite
    public static function get(int $id_vehicles): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `vehicles` WHERE `id_vehicles` = :id_vehicles';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif 
        //PDO::PARAM_INT -> permet de typer la valeur de retour (ici en INT) par défaut en string
        $sth->execute();
        //la méthode execute retourne un booléen
        $result = $sth->fetch();
        //fetch récupére le premier enregistrement
        //sth -> statements handle
        return $result;
    }






}