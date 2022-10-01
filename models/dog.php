<?php

require_once(dirname(__FILE__) . '/../config/database.php');

class Dog_profil {
    // Attributs
    private int $id;
    private string $name;
    private string $nickname;
    private string $birthdate;
    private int $weight;
    private string $breed;
    private string $stats;
    private string $behavior;
    private string $description;

    private object $pdo;


        /**
     * Méthode appelée automatiquement lors de l'instanciation de la classe
     */
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    // Les setters
    /**
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

        /**
     * @param string $lastname
     * 
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
        /**
     * @param string $firstname
     * 
     * @return void
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }
        /**
     * @param string $lastname
     * 
     * @return void
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }
        /**
     * @param string $birthdate
     * 
     * @return void
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }
        /**
     * @param string $address
     * 
     * @return void
     */
    public function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }
        /**
     * @param string $profilPictures
     * 
     * @return void
     */
    public function setStats(string $stats): void
    {
        $this->stats = $stats;
    }
        /**
     * @param string $role
     * 
     * @return void
     */
    public function setBehavior(string $behavior): void
    {
        $this->behavior = $behavior;
    }
  
    /**
     * @param string $description
     * 
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $id_consumer
     * 
     * @return void
     */
    public function setId_consumer(string $id_consumer): void
    {
        $this->id_consumer = $id_consumer;
    }
    // Les guetters
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->Id;
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
    public function getNickname(): string
    {
        return $this->nickname;
    }
        /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }
        /**
     * @return string
     */
    public function getWeight(): int
    {
        return $this->weight;
    }
        /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }
        /**
     * @return string
     */
    public function getStats(): string
    {
        return $this->stats;
    }
        /**
     * @return string
     */
    public function getBehavior(): string
    {
        return $this->behavior;
    }
        /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
            /**
     * @return string
     */
    public function getId_consumer(): string
    {
        return $this->id_consumer;
    }

        /**
     * Méthode qui permet de créer un chien
     * 
     * @return boolean
     */
    public function insert(): bool
    {

        try {
            $pdo = Database::getInstance();
            // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `dog_profil` (`name`, `nickname`, `birthdate`, `weight`, `breed`, `stats`,`behavior`,`description`, `id_consumer`) 
                VALUES (:name, :nickname, :birthdate, :weight, :breed, :stats, :behavior, :description, :id_consumer);';

            // On prépare la requête
            $sth = $this->pdo->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':name', $this->getName(), PDO::PARAM_STR);
            $sth->bindValue(':nickname', $this->getNickname(), PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
            $sth->bindValue(':weight', $this->getWeight(), PDO::PARAM_INT);
            $sth->bindValue(':breed', $this->getBreed(), PDO::PARAM_STR);
            $sth->bindValue(':stats', $this->getStats(), PDO::PARAM_STR);
            $sth->bindValue(':behavior', $this->getBehavior(), PDO::PARAM_STR);
            $sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
            $sth->bindValue('id_consumer', $this->getId_consumer(), PDO::PARAM_STR);
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
     * Méthode permettant de récupérer toutes les données du patient
     * @param int $id
     * 
     * @return mixed
     * Retourne un objet issu de la class Patient ou false
     */
    public static function get(int $id): mixed
    {

        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête
            $sql = 'SELECT * FROM dog_profil WHERE `id` = :id';

            // On prépare la requête
            $sth = $pdo->prepare($sql);

            // On affecte chaque valeur à chaque marqueur nominatif
            $sth->bindValue(':id', $id, PDO::PARAM_INT);

            if ($sth->execute() === false) {
                //Erreur générale
                return false;
            } else {
                $patient = $sth->fetch();
                if ($patient === false) {
                    //Patient non trouvé
                    return false;
                } else {
                    return $patient;
                }
            }
        } catch (\PDOException $ex) {
            //var_dump($ex);
            return false;
        }
    }

    /**
     * Méthode qui permet de mettre à jour un patient
     * 
     * @param int $id
     * 
     * @return boolean
     */

    public function update(int $id): bool
    {
        try {

            $sql = 'UPDATE `dog_profil` SET 
                        `name` = :name, 
                        `nickname` = :nickname, 
                        `birthdate` = :birthdate,
                        `weight` = :weight,
                        `breed` = :breed
                        `stats` = :stats, 
                        `behavior` = :behavior
                        `description` = :description
                    WHERE `id` = :id';

            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':name', $this->getName());
            $sth->bindValue(':nickname', $this->getNickname());
            $sth->bindValue(':birthdate', $this->getBirthdate());
            $sth->bindValue(':weight', $this->getWeight());
            $sth->bindValue(':breed', $this->getBreed());
            $sth->bindValue(':stats', $this->getStats());
            $sth->bindValue(':behavior', $this->getBehavior());
            $sth->bindValue(':description', $this->getDescription());
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $ex) {
            //var_dump($ex);
            return false;
        }
    }

        // Methode delete 
/**
 * @param mixed $id
 * 
 * @return [type]
 */
public static function delete($id_consumer) 
{
    try
    {
        $pdo = DATABASE::getInstance();
        $sql = 'DELETE FROM `dog_profil` WHERE `id_consumer` = :id_consumer';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_consumer',$id_consumer,PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() >0){
            return true;
        }else{
            return false;
        }
    }catch (PDOException $ex){
        var_dump($ex);
        return false;
    }
}

/**
     * Méthode statique qui permet de lister tous les patients depuis le champs de recherche
     * 
     * @return array
     */
    public static function getAll(?string $search = '', int $offset = 0, int $limit =0): array // Méthode statique car il est inutile d'instancier, car pas d'hydratation
    {
        try {

            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();
            // On créé la requête
            $sql = "SELECT `name`, `nickname`,`weight`,`breed`, `birthdate`, `id_consumer` 
            FROM `dog_profil` 
            WHERE((`name` LIKE :search) OR (`nickname` LIKE :search) OR (`breed` LIKE :search) OR (`birthdate` LIKE :search))";
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

    // Recupération d'un chien 

    public static function getByConsumer(string $id_consumer): object|bool
    {
        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête avec des marqueurs nominatifs
            $sql = 'SELECT * FROM `dog_profil` WHERE `id_consumer` = :id_consumer;';

            // On prépare la requête
            $sth = $pdo->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':id_consumer', $id_consumer, PDO::PARAM_STR);

            if (!$sth->execute()) {
                return false;
            } else {
                $dog = $sth->fetch();
                if (empty($dog)) {
                    return false;
                }
            }

            return $dog;
        } catch (\PDOException $ex) {
            return false;
        }
    }

}