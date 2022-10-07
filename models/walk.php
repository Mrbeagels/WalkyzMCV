<?php

require_once(dirname(__FILE__) . '/../config/database.php');
require_once(dirname(__FILE__) . '/../models/city.php');


class Walk {

    private int $id_walk;
    private string $name;
    private string $address;
    private string $type;
    private string $duration;
    private string $walk_date;
    private string $description;
    private int $id_consumer;

    private object $pdo;

        /**
     * Méthode appelée automatiquement lors de l'instanciation de la classe
     */
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    // Les setters

    // Les setters
    /**
     * @param int $id_walk
     * 
     * @return void
     */
    public function setId_walk(int $id_walk): void
    {
        $this->id_walk = $id_walk;
    }
    // Les setters
    /**
     * @param string $name
     * 
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    // Les setters
    /**
     * @param int $address
     * 
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
    // Les setters
    /**
     * @param int $walk_date
     * 
     * @return void
     */
    public function setWalk_date(string $walk_date): void
    {
        $this->walk_date = $walk_date;
    }
    // Les setters
    /**
     * @param string $duration
     * 
     * @return void
     */
    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }
    // Les setters
    /**
     * @param int $type
     * 
     * @return void
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }
    // Les setters
    /**
     * @param int $description
     * 
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    // Les setters
    /**
     * @param int $id_consumer
     * 
     * @return void
     */
    public function setId_consumer(int $id_consumer): void
    {
        $this->id_consumer = $id_consumer;
    }
     // Les setters
    /**
     * @param int $city
     * 
     * @return void
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
     // Les setters
    /**
     * @param int $zipCode
     * 
     * @return void
     */
    public function setZipCode(int $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    // Les guetters
    /**
     * @return int
     */
    public function getId_walk(): int
    {
        return $this->Id_walk;
    }
        /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
        /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
        /**
     * @return string
     */
    public function getWalk_date(): string
    {
        return $this->walk_date;
    }
        /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }
        /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
        /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    // Les guetters
    /**
     * @return int
     */
    public function getId_consumer(): int
    {
        return $this->id_consumer;
    }
      // Les guetters
    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
      // Les guetters
    /**
     * @return int
     */
    public function getZipCode(): int
    {
        return $this->zipCode;
    }
    
        /**
     * Méthode qui permet de créer une balade
     * 
     * @return boolean
     */
    public function insert(): bool
    {

        try {
            $pdo = Database::getInstance();
            // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `walk` (`name`, `address`, `walk_date`, `duration`, `type`, `description`,`id_consumer`, `city`,`zipCode`) 
                VALUES (:name, :address, :walk_date, :duration, :type, :description, :id_consumer, :city, :zipCode);';

            // On prépare la requête
            $sth = $this->pdo->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':name', $this->getName(), PDO::PARAM_STR);
            $sth->bindValue(':address', $this->getAddress(), PDO::PARAM_STR);
            $sth->bindValue(':walk_date', $this->getWalk_date(), PDO::PARAM_STR);
            $sth->bindValue(':duration', $this->getDuration(), PDO::PARAM_STR);
            $sth->bindValue(':type', $this->getType(), PDO::PARAM_INT);
            $sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
            $sth->bindValue('id_consumer', $this->getId_consumer(), PDO::PARAM_STR);
            $sth->bindValue(':city', $this->getCity(), PDO::PARAM_STR);
            $sth->bindValue(':zipCode', $this->getZipcode(), PDO::PARAM_INT);
            // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
            return $sth->execute();
        } catch (PDOException $ex) {
            // var_dump($ex);die;
            // On retourne false si une exception est levée
            return false;
        }
    }

        /**
     * 
     * Méthode permettant de récupérer toutes les données de la balade
     * @param int $id
     * 
     * @return mixed
     * Retourne un objet issu de la class walk ou false
     */
    public static function getUserWalk(int $id_consumer): mixed
    {

        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête
            $sql = 'SELECT * FROM walk WHERE `id_consumer` = :id_consumer';

            // On prépare la requête
            $sth = $pdo->prepare($sql);

            // On affecte chaque valeur à chaque marqueur nominatif
            $sth->bindValue(':id_consumer', $id_consumer, PDO::PARAM_INT);

            if ($sth->execute() === false) {
                //Erreur générale
                return false;
            } else {
                $walk = $sth->fetch();
                if ($walk === false) {
                    //walk non trouvé
                    return false;
                } else {
                    return $walk;
                }
            }
        } catch (\PDOException $ex) {
            //var_dump($ex);
            return false;
        }
    }
    /**
     * Méthode qui permet de mettre à jour une balade
     * 
     * @param int $id
     * 
     * @return boolean
     */

    public function update(int $id_consumer): bool
    {
        try {

            $sql = 'UPDATE `walk` SET 
                        `name` = :name, 
                        `address` = :address, 
                        `walk_date` = :walk_date,
                        `duration` = :duration,
                        `type` = :type,
                        `description` = :description, 
                        `id_consumer` = :id_consumer,
                        `city` = :city,
                        `zipCode` = :zipCode
                    WHERE `id_consumer` = :id_consumer';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':name', $this->getName());
            $sth->bindValue(':address', $this->getAddress());
            $sth->bindValue(':walk_date', $this->getWalk_date());
            $sth->bindValue(':duration', $this->getDuration());
            $sth->bindValue(':type', $this->getType());
            $sth->bindValue(':description', $this->getDescription());
            $sth->bindValue(':id_consumer', $this->getId_consumer());
            $sth->bindValue(':city', $this->getCity());
            $sth->bindValue(':zipCode', $this->getZipCode());
            return $sth->execute();
        } catch (PDOException $ex) {
            // var_dump($ex);
            return false;
        }
    }

            // Methode delete 
/**
 * @param mixed $id
 * 
 * @return [type]
 */
public static function delete($id_walk) 
{
    try
    {
        $pdo = DATABASE::getInstance();
        $sql = 'DELETE FROM `walk` WHERE `id_walk` = :id_walk';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_walk',$id_walk,PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() >0){
            return true;
        }else{
            return false;
        }
    }catch (PDOException $ex){
        // var_dump($ex);
        return false;
    }
}

/**
     * Méthode statique qui permet de lister toutes les balades depuis le champs de recherche
     * 
     * @return array
     */
    public static function getAll(?string $search = '', int $offset = 0, int $limit =0): array // Méthode statique car il est inutile d'instancier, car pas d'hydratation
    {
        try {

            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();
            // On créé la requête
            $sql = "SELECT `name`, `address`,`walk_date`,`duration`, `type`, `description`, `city`, `id_consumer`, `zipCode` 
            FROM `walk` 
            WHERE((`name` LIKE :search) OR (`address` LIKE :search) OR (`type` LIKE :search) OR (`walk_date` LIKE :search)OR (`city` LIKE :search))";
            if($limit!=0){
                $sql .= " LIMIT :limit OFFSET :offset";
            }
            $sql .= ";";
            $sth = $pdo->prepare($sql);
            if($limit!=0){
                $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
                $sth->bindValue(':offset',$offset , PDO::PARAM_INT);
            } 
            $sth->bindValue(':search', '%' . $search . '%',PDO::PARAM_STR);
            $sth->execute();

            // On exécute la requêt
            return $sth->fetchAll();
            
            
        } catch (PDOException $ex) {
            // var_dump($ex);
            return [];
        }
    }


    // moisi du fion 

    
    // methode de la liste de balade
    /**
     * Méthode qui permet de recuperer le profil du chien et la balade pour affichage
     * 
     * @return array
     */
    public static function getAllDogAndWalk(int $id_consumer): array
    {

        $pdo = Database::getInstance();

        try {
            $sql = '    SELECT * 
                        FROM `walk` 
                        INNER JOIN `dog_profil`
                        ON `walk`.`id_consumer` = `dog_profil`.`id`';
            
            $sth = $pdo->prepare($sql);

            if(!is_null($id_consumer)){
                $sth->bindValue(':id_consumer',$id_consumer,PDO::PARAM_INT);
            }
            
            if ($sth->execute() === false) {
                return [];
            } else {
                return $sth->fetchAll();
            }
        } catch (PDOException $ex) {
            // var_dump($ex);
            // On retourne false si une exception est levée
            return [];
        }
    }

}