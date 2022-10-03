<?php

require_once(dirname(__FILE__) . '/../config/database.php');


class City{

    private int $id_city;
    private string $city;
    private $zipCode;
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
     * @param int $id_city
     * 
     * @return void
     */
    public function setId_city(int $id_city): void
    {
        $this->id_city = $id_city;
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
    public function getId_city(): int
    {
        return $this->id_city;
    }
        /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }
        /**
     * @return string
     */
    public function getZipCode(): int
    {
        return $this->zipCode;
    }

/**
     * Méthode qui permet de créer une ville associé a une balade
     * 
     * @return boolean
     */
    public function save(): bool
    {

        try {
            $sql = 'INSERT INTO `city` (`city`, `zipCode`) 
                    VALUES (:city, :zipCode)';
            $sth = $this->pdo->prepare($sql);

            $sth->bindValue(':city', $this->getCity(), PDO::PARAM_STR);
            $sth->bindValue(':zipCode', $this->getzipCode(), PDO::PARAM_INT);
            return $sth->execute();
        } catch (PDOException $ex) {
            // var_dump($ex);
            // On retourne false si une exception est levée
            return false;
        }
    }
    

}