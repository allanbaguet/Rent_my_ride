<?php

require_once __DIR__ . '/../config/database.php';

class Rent {

    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_rents;
    private string $startdate;
    private string $enddate;
    private string $created_at;
    private string $confirmed_at;
    private int $id_vehicles;
    private int $id_clients;


    /** méthode retournant la valeur des ID des réservations
     * @return int
     */
    public function getId_rent(): int
    {
        return $this->id_rents;
    }

    /**
     * méthode affectant la valeur des ID des réservations
     * @param int $id_rents
     */
    public function setId_rents(int $id_rents)
    {
        $this->id_rents = $id_rents;
    }

    /**
     * méthode retournant la valeur de la date de début de réservation
     * @return string
     */
    public function getStartdate(): string
    {
        return $this->startdate;
    }

    /**
     * méthode affectant la valeur de la date de début de réservation
     * @param string $stardate
     */
    public function setStardate(string $startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * méthode retournant la valeur de la date de fin de réservation
     * @return string
     */
    public function getEnddate(): string
    {
        return $this->enddate;
    }

    /**
     * méthode affectant la valeur de la date de fin de réservation
     * @param string $enddate
     */
    public function setEnddate(string $enddate)
    {
        $this->enddate = $enddate;
    }

    /**
     * méthode retournant la valeur de la création de la réservation
     * @return string
     */
    public function getCreated_at(): string
    {
        return $this->created_at;
    }

    /**
     * méthode affectant la valeur de la création de la réservation
     * @param string $created_at
     */
    public function setCreated_at(string $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * méthode retournant la valeur de la confirmation 
     * @return string
     */
    public function getConfirmed_at(): string
    {
        return $this->confirmed_at;
    }

    /**
     * méthode affectant la valeur de la création de la réservation
     * @param string $confirmed_at
     */
    public function setConfirmed_at(string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    /**
     * méthode retournant la valeur des ID des véhicules
     * @return int
     */
    public function getId_vehicles(): int
    {
        return $this->id_vehicles;
    }

    /**
     * méthode affectant la valeur des ID des véhicules
     * @param int $id_vehicles
     */
    public function setId_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

    /**
     * méthode retournant la valeur des ID des clients
     * @return int
     */
    public function getId_clients(): int
    {
        return $this->id_clients;
    }

    /**
     * méthode affectant la valeur des ID des clients
     * @param int $id_clients
     */
    public function setId_clients(int $id_clients)
    {
        $this->id_clients = $id_clients;
    }

    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `rents` (`startdate`, `enddate`, `id_vehicles`, `id_clients`)
        VALUES (:startdate, :enddate, :id_vehicles, :id_clients);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':startdate', $this->getStartdate());
        $sth->bindValue(':enddate', $this->getEnddate());
        $sth->bindValue(':id_vehicles', $this->getId_vehicles(), PDO::PARAM_INT);
        $sth->bindValue(':id_clients', $this->getId_clients(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif
        $result = $sth->execute();
        //$result -> se trouve la réponse de la méthode execute
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }


    public static function get_all(): array
    {
        $pdo = connect();
        $sql = "SELECT * FROM `rents`
        INNER JOIN `vehicles` ON `rents`.`id_vehicles` = `vehicles`.`id_vehicles`
        INNER JOIN `clients` ON `rents`.`id_clients` = `clients`.`id_clients`";
        //requête SQL permettant de joindre la table vehicles et types, et de cibler leur colonne en commun
        //qui est id_types
        $sth = $pdo->query($sql);
        // $sth->bindValue(':order', $order);
        // $sth->execute();
        $vehicleList = $sth->fetchAll(PDO::FETCH_OBJ);
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $vehicleList;
    }

    public static function get(int $id_rents): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `rents` WHERE `id_rents` = :id_rents';
        // INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_rents', $id_rents, PDO::PARAM_INT);
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