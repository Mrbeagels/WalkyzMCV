<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/dog.php');


$id_consumer = $_SESSION['consumer']->id_consumer;
$dog = Dog_profil::getByConsumer($id_consumer);
$_SESSION['dog']=$dog;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //===================== name : Nettoyage et validation =======================
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    //===================== nickname : Nettoyage et validation =======================
    $nickname = trim(filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide

    //===================== birthdate : Nettoyage et validation =======================
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);


    // weight
    $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_NUMBER_INT);
    //===================== breed : Nettoyage et validation =======================
    $breed = trim(filter_input(INPUT_POST, 'breed', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    //===================== stats : Nettoyage et validation =======================

    $stats = intval(filter_input(INPUT_POST, 'stats', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($stats)) {
        $testStats = filter_var($stats, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 5)));
        if (!$testStats) {
            $error["stats"] = "Merci de renseigner le caractére principal de votre chien";
        }
    }

    //===================== behavior : Nettoyage et validation =======================

    $behavior = intval(filter_input(INPUT_POST, 'behavior', FILTER_SANITIZE_NUMBER_INT));



    //===================== Description : Nettoyage et validation =======================
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
    
    if (empty($error)) {
        // **HYDRATATION **/
        $dog = new Dog_profil;
        $dog->setName($name);
        $dog->setNickname($nickname);
        $dog->setBirthdate($birthdate);
        $dog->setWeight($weight);
        $dog->setBreed($breed);
        $dog->setStats($stats);
        $dog->setBehavior($behavior);
        $dog->setDescription($description);
        $dog->setId_consumer($id_consumer);
        $response = $dog->insert();
    
        

        // Tentative d'ajouter le chieng a la session
        $dog = Dog_profil::getByConsumer($id_consumer);

        
        if ($response) {
            $validation = 'Le profil de votre chien est bien enregistré ';
        }
    }
}

include(__DIR__ . '/../views/header.php');
include(__DIR__ . '/../views/dogProfil.php');
include(__DIR__ . '/../views/footer.php');
