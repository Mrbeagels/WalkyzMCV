<?php

require_once(dirname(__FILE__) . '/../config/database.php');
// var_dump($walk_type); die;
class Consumer {
    // SignUp-controller.php ajout d'un utilisateur en BDD 
    private int $id_consumer;
    private int $civility;
    private string $firstname;
    private string $lastname;
    private string $birthdate;
    private string $mail;
    private string $password;
    private int $walk_type;
    private int $walk_time_slot;
    private string $walk_description;

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
    public function setId(int $id_consumer): void
    {
        $this->id = $id_consumer;
    }

        /**
     * @param string $civility
     * 
     * @return void
     */
    public function setCivility(string $civility): void
    {
        $this->civility = $civility;
    }
        /**
     * @param string $firstname
     * 
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
        /**
     * @param string $lastname
     * 
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
        /**
     * @param string $birthdate
     * 
     * @return void
     */
    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }
        /**
     * @param string $role
     * 
     * @return void
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }
        /**
     * @param string $mail
     * 
     * @return void
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }
        /**
     * @param string $password
     * 
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    
    /**
     * @param int $id
     * 
     * @return void
     */
    public function setWalk_type(int $walk_type): void
    {
        $this->walk_type =$walk_type;
        
    }
        /**
     * @param string $walk_time_slot
     * 
     * @return void
     */
    public function setWalk_time_slot(string $walk_time_slot): void
    {
        $this->walk_time_slot = $walk_time_slot;
    }
        /**
     * @param string $walk_description
     * 
     * @return void
     */
    public function setWalk_description(string $walk_description): void
    {
        $this->walk_description = $walk_description;
    }

    // Les guetters
    /**
     * @return int
     */
    public function getId_consumer(): int
    {
        return $this->id_consumer;
    }
        /**
     * @return string
     */
    public function getCivility(): string
    {
        return $this->civility;
    }
        /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }
        /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
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
    public function getRole(): string
    {
        return $this->role;
    }
        /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }
        /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

        /**
     * @return int
     */
    public function getWalk_type(): int
    {
        return $this->walk_type;
    }
        /**
     * @return int
     */
    public function getWalk_time_slot(): int
    {
        return $this->walk_time_slot;
    }
        /**
     * @return string
     */
    public function getWalk_description(): string
    {
        return $this->walk_description;
    }


    /**
     * 
     * Méthode permettant de vérifier si un email est présent en bdd
     * 
     * @param string $mail
     * 
     * @return bool
     */
    public static function isMailExists(string $mail): bool
    {
        try {
            $sql = 'SELECT * FROM `consumer` WHERE `mail` = :mail';

            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $sth->execute();

            return empty($sth->fetch()) ? false : true;
        } catch (\PDOException $ex) {
            return false;
        }
    }
//                  Insertion des utilisateurs
    public function insertConsumer():bool 
    {
        try{
            $pdo = Database::getInstance();

            // on crée la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `consumer` (`civility`, `firstname`, `lastname`, `birthdate`, `mail`, `password`, `walk_type`, `walk_time_slot`, `walk_description`)
            VALUES (:civility, :firstname, :lastname, :birthdate, :mail, :password, :walk_type, :walk_time_slot, :walk_description);';

            //  on prépare la requête
            $sth = $this->pdo->prepare($sql);

            // affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':civility', $this->getCivility(), PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
            $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            $sth->bindValue(':walk_type', $this->getWalk_type(), PDO::PARAM_INT);
            $sth->bindValue(':walk_time_slot', $this->getWalk_time_slot(), PDO::PARAM_INT);
            $sth->bindValue(':walk_description', $this->getWalk_description(), PDO::PARAM_STR);
            
            // On retourne directement true si la requete s'est bien exécutée ou false dans le cas contraire

            return $sth->execute();
            
        }catch (PDOException $ex) {
            // var_dump($ex);die;
            // on retourne false si une exception est levée
            return false;
        }
    } 

    

    // Retourne un utilisateur grâce a son mail 

    public static function getByEmail(string $mail): object|bool
    {
        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête avec des marqueurs nominatifs
            $sql = 'SELECT * FROM `users` WHERE `mail` = :mail;';

            // On prépare la requête
            $sth = $pdo->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':email', $mail, PDO::PARAM_STR);

            if (!$sth->execute()) {
                return false;
            } else {
                $user = $sth->fetch();
                if (empty($user)) {
                    return false;
                }
            }

            return $user;
        } catch (\PDOException $ex) {
            return false;
        }
    }


    /**
     * 
     * Méthode permettant de récupérer toutes les données de l'utilisateur
     * @param int $id
     * 
     * @return mixed
     * Retourne un objet issu de la class consumer ou false
     */
    public static function get(int $id_consumer): mixed
    {

        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête
            $sql = 'SELECT * FROM consumer WHERE `id_consumer` = :id_consumer';

            // On prépare la requête
            $sth = $pdo->prepare($sql);

            // On affecte chaque valeur à chaque marqueur nominatif
            $sth->bindValue(':id_consumer', $id_consumer, PDO::PARAM_INT);

            if ($sth->execute() === false) {
                //Erreur générale
                return false;
            } else {
                $consumer = $sth->fetch();
                if ($consumer === false) {
                    //Patient non trouvé
                    return false;
                } else {
                    return $consumer;
                }
            }
        } catch (\PDOException $ex) {
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

    public function update(int $id_consumer): bool
    {
        try {
            $sql = 'UPDATE `consumer` SET
                        `civility` = :civility
                        `firstname` = :firstname, 
                        `lastname` = :lastname, 
                        `birthdate` = :birthdate, 
                        `mail` =:mail,
                        `walk_type` = :walk_type,
                        `walk_time_slot` = : walk_time_slot,
                        `walk_description` = : walk_description,
                    WHERE `id_consumer` = :id_consumer';

            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':civility', $this->getCivility());
            $sth->bindValue(':lastname', $this->getLastname());
            $sth->bindValue(':firstname', $this->getFirstname());
            $sth->bindValue(':birthdate', $this->getBirthdate());
            $sth->bindValue(':mail', $this->getMail());
            $sth->bindValue(':walk_type', $this->getWalk_type());
            $sth->bindValue(':walk_time_slot', $this->getWalk_time_slot());
            $sth->bindValue(':walk_description', $this->getWalk_description());
            
            $sth->bindValue(':id_consumer', $id_consumer, PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $ex) {
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
        $sql = 'DELETE FROM `consumer` WHERE `id_consumer` = :id_consumer';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_consumer',$id_consumer,PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() >0){
            return true;
        }else{
            return false;
        }
    }catch (PDOException $ex){
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
            $sql = "SELECT`id_consumer`,`civility`,`firstname`, `lastname`,`birthdate`, `mail`, `walk_type`,`walk_time_slot`  
            FROM `consumer` 
            WHERE((`lastname` LIKE :search) OR (`firstname` LIKE :search) OR (`mail` LIKE :search) OR (`civility` LIKE :search))";
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
            return [];
        }
    }
}