<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/dogs.php');
require_once(dirname(__FILE__) . '/../models/user.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //===================== typeOfWalkyz : Nettoyage et validation =======================
    $typeOfWalkyz = intval(filter_input(INPUT_POST, 'typeOfWalkyz', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($typeOfWalkyz)) {
        $testTypeOfWalkyz = filter_var($typeOfWalkyz, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 4)));
        if (!$testTypeOfWalkyz) {
            $error["typeOfWalkyz"] = "Merci de choisir un type de balade";
        }
    }

     //===================== whenWalkyz : Nettoyage et validation =======================
        $whenWalkyz = intval(filter_input(INPUT_POST, 'whenWalkyz', FILTER_SANITIZE_NUMBER_INT));

        if (!empty($whenWalkyz)) {
            $testWhenWalkyz = filter_var($whenWalkyz, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 4)));
            if (!$testWhenWalkyz) {
                $error["whenWalkyz"] = "Merci de choisir une préférence de temps pour votre balade";
            }
        }
         //===================== Description : Nettoyage et validation =======================
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));    
        if(!empty($description)){
            $testDescription = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
        
            if(!$testDescription){
                $error["description"] = "Votre description n'est pas conforme, merci de n'utiliser que des lettres et des chiffres.";
            } 
        }
        //===================== firstname : Nettoyage et validation =======================
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
        // On vérifie que ce n'est pas vide
        if (!empty($firstname)) {
            $testRegex = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$testRegex) {
                $error["firstname"] = "Le prénom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($firstname) <= 1 || strlen($firstname) >= 70) {
                    $error["firstname"] = "La longueur du prénom n'est pas bon";
                }
            }
        } else { // Pour les champs obligatoires, on retourne une erreur
            $error["firstname"] = "Vous devez entrer un prénom!!";
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

            // age

    $age = trim(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT));
    // On vérifie que ce n'est pas vide
    if (!empty($age)) {
        $testRegex = filter_var($age, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_AGE . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["age"] = "Le prénom n'est pas au bon format!!";
        }  else { // Pour les champs obligatoires, on retourne une erreur
        $error["age"] = "Vous devez choisir un prenom valide!!";
    }
}

        // weight
$weight = trim(filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_NUMBER_INT));
// On vérifie que ce n'est pas vide
if (!empty($weight)) {
    $testRegex = filter_var($weight, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_AGE . '/')));
    // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
    if (!$testRegex) {
        $error["weight"] = "Le prénom n'est pas au bon format!!";
    }  else { // Pour les champs obligatoires, on retourne une erreur
    $error["weight"] = "Vous devez choisir un prenom valide!!";
}
}
    //===================== DOGBREED : Nettoyage et validation =======================
    $dogBreed = trim(filter_input(INPUT_POST, 'dogBreed$dogBreed', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($dogBreed)) {
        $testRegex = filter_var($dogBreed, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["dogBreed$dogBreed"] = "Le prénom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($dogBreed) <= 1 || strlen($dogBreed) >= 70) {
                $error["dogBreed$dogBreed"] = "La longueur du prénom n'est pas bon";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["dogBreed$dogBreed"] = "Vous devez entrer un prénom!!";
    }
//===================== dogStats : Nettoyage et validation =======================

$dogStats = intval(filter_input(INPUT_POST, 'dogStats', FILTER_SANITIZE_NUMBER_INT));

if (!empty($dogStats)) {
    $testdogStats = filter_var($dogStats, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 2)));
    if (!$testdogStats) {
        $error["dogStats"] = "Merci de renseigner le caractére principal de votre chien";
    }
}

//===================== dogBehavior : Nettoyage et validation =======================

$dogBehavior = intval(filter_input(INPUT_POST, 'dogBehavior', FILTER_SANITIZE_NUMBER_INT));

if (!empty($dogBehavior)) {
    $testdogBehavior = filter_var($dogBehavior, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 2)));
    if (!$testdogBehavior) {
        $error["dogBehavior"] = "Merci de renseigner le caractére principal de votre chien";
    }
}

         //===================== dogDescription : Nettoyage et validation =======================
        $dogDescription = trim(filter_input(INPUT_POST, 'dogDescription', FILTER_SANITIZE_SPECIAL_CHARS));    
        if(!empty($dogDescription)){
            $testdogDescription = filter_var($dogDescription, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
        
            if(!$testdogDescription){
                $error["dogDescription"] = "Votre dogDescription n'est pas conforme, merci de n'utiliser que des lettres et des chiffres.";
            } 
        }

         //===================== filePicture : Nettoyage et validation =======================
    if (isset($_FILES['filePicture'])) {
        $filePicture = $_FILES['filePicture'];
        if(!empty($filePicture['tmp_name'])){
            if($filePicture['error']>0){
                $error["filePicture"] = "erreur lors du transfert du fichier"; 
            } else {
                if(!in_array($filePicture['type'], AUTHORIZED_IMAGE_FORMAT)){
                    $error["filePicture"] = "Le format du fichier n'est pas accepté";
                } else {
                    $extension = pathinfo($filePicture['name'],PATHINFO_EXTENSION);
                    $from = $filePicture['tmp_name'];
                    $fileName = uniqid('img_').'.'.$extension;
                    $to = dirname(__FILE__).'/../public/uploads/'.$fileName;
                    move_uploaded_file($from, $to);
                }
            }
        } 
    }
    var_dump($typeOfWalkyz, $whenWalkyz, $description, $firstname, $nickname, $age, $weight, $dogBreed, $dogStats, $dogBehavior, $dogDescription, $filePicture );
    die;
}

include(__DIR__.'/../views/header.php');
include(__DIR__.'/../views/profil.php');
include(__DIR__.'/../views/footer.php');