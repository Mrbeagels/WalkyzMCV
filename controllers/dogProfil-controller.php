<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/dog.php');

// var_dump($_SESSION['consumer']);
// 
$id_consumer = $_SESSION['consumer']->id_consumer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //===================== name : Nettoyage et validation =======================
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($name)) {
        $testRegex = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["name"] = "Le prénom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($name) <= 1 || strlen($name) >= 70) {
                $error["name"] = "La longueur du prénom n'est pas bon";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["name"] = "Vous devez entrer un prénom!!";
    }
    //===================== nickname : Nettoyage et validation =======================
    $nickname = trim(filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($nickname)) {
        $testRegex = filter_var($nickname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["nickname"] = "Le prénom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($nickname) <= 1 || strlen($nickname) >= 70) {
                $error["nickname"] = "La longueur du prénom n'est pas bon";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["nickname"] = "Vous devez entrer un prénom!!";
    }

    //===================== birthdate : Nettoyage et validation =======================
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
    if (!empty($birthdate)) {
        $birthdateObj = DateTime::createFromFormat('Y-m-d', $birthdate);
        $currentDateObj = new DateTime();
        if (!$birthdateObj) {
            $error["birthdate"] = "La date entrée n'est pas valide!";
        } else {
            $diff = $birthdateObj->diff($currentDateObj);
            $age = $diff->days / 365;
            if (!$birthdateObj || $diff->invert == 1 || $birthdateObj->format('Y-m-d') !== $birthdate || $age == 0 || $age > 120) {
                $error["birthdate"] = "La date entrée n'est pas valide!";
            }
        }
    }


    // weight
    $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_NUMBER_INT);
    //===================== breed : Nettoyage et validation =======================
    $breed = trim(filter_input(INPUT_POST, 'breed', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($breed)) {
        $testRegex = filter_var($breed, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["breed"] = "Le prénom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($breed) <= 1 || strlen($breed) >= 70) {
                $error["breed"] = "La longueur du prénom n'est pas bon";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["dogBreed"] = "Vous devez entrer un prénom!!";
    }
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

    if (!empty($behavior)) {
        $testBehavior = filter_var($behavior, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 3)));
        if (!$testBehavior) {
            $error["behavior"] = "Merci de renseigner le caractére principal de votre chien";
        }
    }

    //===================== Description : Nettoyage et validation =======================
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($description)) {
        $testdescription = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

        if (!$testdescription) {
            $error["description"] = "Votre description n'est pas conforme, merci de n'utiliser que des lettres et des chiffres.";
        }
    }

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
            $errorArray['global'] = 'Votre profil est bien enregistré';
        }
    }
}

include(__DIR__ . '/../views/header.php');
include(__DIR__ . '/../views/dogProfil.php');
include(__DIR__ . '/../views/footer.php');
