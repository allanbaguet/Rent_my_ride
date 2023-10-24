<?php

require_once __DIR__ . '/../config/database.php';



class Vehicle
{
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
    public function getMileage(): int
    //récupération des valeurs de l'attribut / Getter 
    {
        return $this->mileage;
    }

    /**
     * méthode affectant la valeur des ID du kilométrage
     * @param string $type
     * 
     */
    public function setMileage(int $mileage)
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
        $sql = 'INSERT INTO `vehicles` (`brand`, `model`, `registration`, `mileage`, `picture`, `id_types`)
        VALUES (:brand, :model, :registration, :mileage, :picture, :id_types);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_types', $this->getId_types(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif
        $result = $sth->execute();
        //$result -> se trouve la réponse de la méthode execute
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }

    //méthode static est accessible sans la création d'un objet
    // public static function get_all(): array
    // {
    //     $pdo = connect();
    //     $sql = 'SELECT * FROM `vehicles`
    //     INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types` WHERE `deleted_at` IS NULL ORDER BY `types`.`type`, `vehicles`.`brand`, `vehicles`.`model`;';
    //     //requête SQL permettant de joindre la table vehicles et types, et de cibler leur colonne en commun
    //     //qui est id_types
    //     $sth = $pdo->query($sql);
    //     $vehicleList = $sth->fetchAll();
    //     //fetchAll récupére tout les enregistrements
    //     //sth -> statements handle
    //     return $vehicleList;
    // }

    public static function get_all(string $order): array
    {
        $pdo = connect();
        $sql = "SELECT * FROM `vehicles`
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types` WHERE `deleted_at` IS NULL ORDER BY `vehicles`.`brand` $order;";
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

    //méthode permettant de récuperer les infos du formulaire pour les modifiés ensuite
    public static function get(int $id_vehicles): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `vehicles` WHERE `id_vehicles` = :id_vehicles';
        // INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`';
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

    //Méthode permettant la mise à jour d'une fiche véhicule
    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `vehicles` SET `brand` = :brand,
        `model` = :model,
        `registration` = :registration,
        `mileage` = :mileage,
        `picture` = :picture,
        `id_types` = :id_types
        WHERE `id_vehicles` = :id_vehicles';
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_types', $this->getId_types(), PDO::PARAM_INT);
        $sth->bindValue(':id_vehicles', $this->getId_vehicles(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        return (bool) $sth->rowCount();
        //rowCount renvoi le nombre de ligne envoyé -> renvoi booléen 1, 2, 3 ...
    }


    //public static ici car on ne manipule pas de donnée
    public static function archive(int $id_vehicles): bool
    {
        $pdo = connect();
        //SET `deleted_at` = NOW() permet de mettre à jour la colonne deleted_at à l'heure de l'envois à l'archive
        $sql = 'UPDATE `vehicles` SET `deleted_at` = NOW() WHERE `id_vehicles` = :id_vehicles';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }

    public static function get_archive(string $order): array
    {
        $pdo = connect();
        $sql = "SELECT * FROM `vehicles`
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types` WHERE `deleted_at` IS NOT NULL ORDER BY `vehicles`.`brand` $order;";
        //requête SQL permettant de joindre la table vehicles et types, et de cibler leur colonne en commun
        //qui est id_types
        $sth = $pdo->query($sql);
        // $sth->bindValue(':order', $order);
        // $sth->execute();
        $vehicleArchived = $sth->fetchAll(PDO::FETCH_OBJ);
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $vehicleArchived;
    }

    public static function unarchive(int $id_vehicles): bool
    {
        $pdo = connect();
        //SET `deleted_at` = NULL permet de mettre à jour la colonne deleted_at, et la mettre en NULL
        $sql = 'UPDATE `vehicles` SET `deleted_at` = NULL WHERE `id_vehicles` = :id_vehicles';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }


    //public static ici car on ne manipule pas de donnée
    public static function delete(int $id_vehicles): bool
    {
        $pdo = connect();
        $sql = 'DELETE FROM `vehicles` WHERE `id_vehicles` = :id_vehicles';
        //:id_vehicles -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }

    //définit le paramètre d'url par défaut à 0 -> affichage de toute les catégories
    public static function get_all_vehicle(int $id_types = 0, $search = '', int $page = 1, bool $countAll = false): array
    {
        // Offset 0 = page 1 / Offset 10 = page 2 / Offset 20 = page 3 ...
        $limit = NB_PER_PAGE;
        $offset = ($page - 1) * $limit;
        $pdo = connect();
        $sql = "SELECT * FROM `vehicles`
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types` WHERE `deleted_at` IS NULL";

        // Condition si différent de 0 -> entre dans la condition et concatène la requête SQL et
        // sélectionne l'id_types de la table vehicles
        if ($id_types != 0) {
            $sql .= " AND `vehicles`.`id_types` = :id_types";
        }

        if (!empty($search)) {
            $sql .= " AND (`vehicles`.`brand` LIKE :search OR `vehicles`.`model` LIKE :search)";
        }

        if ($countAll == false) {
            $sql .= " LIMIT :limit OFFSET :offset";
        }

        $sth = $pdo->prepare($sql);

        // Condition comme ci-dessus, si différent de 0, bindValue de l'id_types car marqueur nominatif
        // que si on rentre dans la condition ci-dessus
        if ($id_types != 0) {
            $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        }

        if (!empty($search)) {
            $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }

        if ($countAll == false) {
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', NB_PER_PAGE, PDO::PARAM_INT);
        }

        $sth->execute();

        // La méthode execute retourne un booléen
        $vehicleList = $sth->fetchAll(PDO::FETCH_OBJ);

        // fetchAll récupère tous les enregistrements
        return $vehicleList;
    }
}
