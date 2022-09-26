<?php

require_once(dirname(__FILE__) . '/../config/database.php');

class Users {
    // SignUp-controller.php ajout d'un utilisateur en BDD 
    private int $id_users;
    private string $civility;
    private string $firstname;
    private string $lastname;
    private string $birthdate;
    private string $address;
    private string $profilPictures;
    private string $role;
    private string $mail;
    private string $password;

    // profil-controller.php ajout des préférences utilisateurs en BDD
    private string $id_users_preferences;
    private string $walk_type;
    private string $time_slot;
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
    public function setId(int $id_users): void
    {
        $this->id = $id_users;
    }

        /**
     * @param string $lastname
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
     * @param string $address
     * 
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
        /**
     * @param string $profilPictures
     * 
     * @return void
     */
    public function setProfilPictures(string $profilPictures): void
    {
        $this->profilPictures = $profilPictures;
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

    // Les guetters
    /**
     * @return int
     */
    public function getId_users(): int
    {
        return $this->id_users;
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
    public function getAddress(): string
    {
        return $this->address;
    }
        /**
     * @return string
     */
    public function getProfilPictures(): string
    {
        return $this->profilPictures;
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

    // Getter et setter pour l'ajout des préférences utilisateurs 
    /**
     * @param int $id_users_preferences
     * 
     * @return void
     */
    public function setId_users_preferences(int $id_users_preferences): void
    {
        $this->id_users_preferences = $id_users_preferences;
    }
        /**
     * @param int $walk_type
     * 
     * @return void
     */
    public function setWalk_type(int $walk_type): void
    {
        $this->walk_type = $walk_type;
    }
        /**
     * @param int time_slot
     * 
     * @return void
     */
    public function setTime_slot(int $time_slot): void
    {
        $this->time_slot = $time_slot;
    }
        /**
     * @param int $description
     * 
     * @return void
     */
    public function setDescription(int $description): void
    {
        $this->description = $description;
    }
    /**
     * @return int
     */
    public function getId_users_preferences(): int
    {
        return $this->id_users_preferences;
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
    public function getTime_slot(): int
    {
        return $this->time_slot;
    }
    /**
     * @return int
     */
    public function getDescription(): int
    {
        return $this->description;
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
            $sql = 'SELECT * FROM `users` WHERE `mail` = :mail';

            $sth = Database::getInstance()->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $sth->execute();

            return empty($sth->fetch()) ? false : true;
        } catch (\PDOException $ex) {
            //var_dump($ex);
            return false;
        }
    }
//                  Insertion des utilisateurs
    public function insertUser():bool 
    {
        try{
            $pdo = Database::getInstance();

            // on crée la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `users` (`civility`, `firstname`, `lastname`, `birthdate`, `address`, `profilPictures`, `role`, `mail`, `password`)
            VALUES (:civility, :firstname, :lastname, :birthdate, :address, :profilPictures, :role, :mail, :password);';

            //  on prépare la requête
            $sth = $this->pdo->prepare($sql);

            // affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':civility', $this->getCivility(), PDO::PARAM_STR);
            $sth->bindValue(':fistname', $this->getFirstname(), PDO::PARAM_STR);
            $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
            $sth->bindValue(':address', $this->getAddress(), PDO::PARAM_STR);
            $sth->bindValue(':profilPictures', $this->getProfilPictures(), PDO::PARAM_STR);
            $sth->bindValue(':role', $this->getRole(), PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            $sth->bindValue(':civility', $this->getCivility(), PDO::PARAM_STR);

            // On retourne directement true si la requete s'est bien exécutée ou false dans le cas contraire

            return $sth->execute();
        
        }catch (PDOException $ex) {
            // on retourne false si une exception est levée
            return false;
        }
    } 
//                  Insertion des préférences utilisateurs

    public function insertUserPreferences():bool 
    {
        try{
            $pdo = Database::getInstance();

            // on crée la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `users_preferences` (`walk_type`, `time_slot`, `description`)
            VALUES (:walk_type, :time_slot, :description);';

            //  on prépare la requête
            $sth = $this->pdo->prepare($sql);

            // affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':walk_type', $this->getWalk_type(), PDO::PARAM_STR);
            $sth->bindValue(':time_slot', $this->getTime_slot(), PDO::PARAM_STR);
            $sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
            // On retourne directement true si la requete s'est bien exécutée ou false dans le cas contraire

            return $sth->execute();
        
        }catch (PDOException $ex) {
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
     * Retourne un objet issu de la class Users ou false
     */
    public static function get(int $id_users): mixed
    {

        try {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();

            // On créé la requête
            $sql = 'SELECT * FROM users WHERE `id_users` = :id_users';

            // On prépare la requête
            $sth = $pdo->prepare($sql);

            // On affecte chaque valeur à chaque marqueur nominatif
            $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);

            if ($sth->execute() === false) {
                //Erreur générale
                return false;
            } else {
                $user = $sth->fetch();
                if ($user === false) {
                    //Patient non trouvé
                    return false;
                } else {
                    return $user;
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

    public function update(int $id_user): bool
    {
        try {

            $sql = 'UPDATE `user` SET
                        `civility` = :civility
                        `firstname` = :firstname, 
                        `lastname` = :lastname, 
                        `birthdate` = :birthdate, 
                        `address` = :address, 
                        `profilPictures` = :profilPictures,
                        `role` =  :role,
                        `mail` =:mail,
                    WHERE `id_user` = :id_user';

            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':civility', $this->getCivility());
            $sth->bindValue(':lastname', $this->getLastname());
            $sth->bindValue(':firstname', $this->getFirstname());
            $sth->bindValue(':birthdate', $this->getBirthdate());
            $sth->bindValue(':address', $this->getAddress());
            $sth->bindValue(':profilPictures', $this->getProfilPictures());
            $sth->bindValue(':role', $this->getRole());
            $sth->bindValue(':mail', $this->getMail());
            $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $ex) {
            //var_dump($ex);
            return false;
        }
    }
    /**
     * Méthode qui permet de mettre à jour les préférences d'un user
     * 
     * @param int $id
     * 
     * @return boolean
     */

    public function updatePreferences(int $id_users_preferences): bool
    {
        try {

            $sql = 'UPDATE `users_preferences` SET 
                        `walk_type` = :walk_type, 
                        `time_slot` = :time_slot, 
                        `description` = :birthdate, 
                    WHERE `id_users_preferences` = :id_user_preferences';

            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':walk_type', $this->getWalk_type());
            $sth->bindValue(':time_slot', $this->getTime_slot());
            $sth->bindValue(':description', $this->getDescription());
            $sth->bindValue(':id_users_preferences', $id_users_preferences, PDO::PARAM_INT);
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
public static function delete($id_users) 
{
    try
    {
        $pdo = DATABASE::getInstance();
        $sql = 'DELETE FROM `users` WHERE `id_users` = :id_users';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id',$id_users,PDO::PARAM_INT);
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

        // Methode delete preferences users
/**
 * @param mixed $id
 * 
 * @return [type]
 */
public static function deletePreferences($id_users_preferences) 
{
    try
    {
        $pdo = DATABASE::getInstance();
        $sql = 'DELETE FROM `users_preferences` WHERE `id_users_preferences` = :id_users_preferences';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_users_preferences',$id_users_preferences,PDO::PARAM_INT);
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
            $sql = "SELECT `civility`,`firstname`, `lastname`,`birthdate`, `mail`, `id_users` 
            FROM `users` 
            WHERE((`lastname` LIKE :search) OR (`firstname` LIKE :search) OR (`mail` LIKE :search))";
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
            //var_dump($ex);
            return [];
        }
    }
}