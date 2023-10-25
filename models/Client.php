<?php

require_once __DIR__ . '/../config/database.php';

class Client {

    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_clients;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $birthday;
    private string $phone;
    private string $city;
    private string $zipcode;
    private string $created_at;
    private string $updated_at;

    public function getId_clients(): int
    {
        return $this->id_clients;
    }

    public function setId_clients(int $id_clients)
    {
        $this->id_clients = $id_clients;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function setEmail (string $email)
    {
        $this->email = $email;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    } 

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function getCreated_at(): string
    {
        return $this->created_at;
    }

    public function setCreated_at(string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    public function setUpdated_at(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `clients` (`lastname`, `firstname`, `email`, `birthday`, `phone`, `zipcode`)
        VALUES (:lastname, :firstname, :email, :birthday, :phone, :zipcode);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':birthday', $this->getBirthday());
        $sth->bindValue(':phone', $this->getPhone());
        $sth->bindValue(':zipcode', $this->getZipcode());
        //bindValue -> affecter une valeur à un marqueur nominatif
        $result = $sth->execute();
        //$result -> se trouve la réponse de la méthode execute
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }

    public static function get(int $id_clients): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `clients` WHERE `id_clients` = :id_clients';
        // INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_clients', $id_clients, PDO::PARAM_INT);
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