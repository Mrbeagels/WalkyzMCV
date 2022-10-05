<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/walk.php');

$id_consumer = $_SESSION['consumer']->id_consumer;
$walk = Walk::getUserWalk($id_consumer);
$_SESSION['walk']=$walk;
$dayDate= date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // name de la balade
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));

    //===================== zipCode : Nettoyage et validation =======================
    $zipCode = trim(filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($zipCode)) {
        $testRegex = filter_var($zipCode, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
        if (!$testRegex) {
            $error["zipCode"] = "Vous devez entrer un code postal valide";
        }
    }

    // city
    $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS));

    // Adresse
    $address= trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS));

        //===================== birthdate : Nettoyage et validation =======================


        $walk_date = filter_input(INPUT_POST, 'walk_date', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($walk_date)) {
            $testRegex = filter_var($walk_date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DATETIME . '/')));
            if (!$testRegex) {
                $error["walk_date"] = "Vous devez entrer un code postal valide";
            }
        }

        // durée
        $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_SPECIAL_CHARS);

        //===================== type : Nettoyage et validation =======================
    $type = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($type)) {
        $testType = filter_var($type, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 4)));
        if (!$testType) {
            $error["type"] = "Merci de choisir un type de balade";
        }
    }

    //===================== walk_description : Nettoyage et validation =======================
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($description)) {
        $testDescription = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

        if (!$testDescription) {
            $error["description"] = "Votre description n'est pas conforme, merci de n'utiliser que des lettres et des chiffres.";
        }
    }

    // var_dump($error);die;
if (empty($error)) {
    // **HYDRATATION **/
    $walk = new Walk;
    $walk->setName($name);
    $walk->setAddress($address);
    $walk->setWalk_date($walk_date);
    $walk->setDuration($duration);
    $walk->setType($type);
    $walk->setDescription($description);
    $walk->setId_consumer($id_consumer);
    $walk->setCity($city);
    $walk->setZipCode($zipCode);
    $response = $walk->insert();
    
    
            // Tentative d'ajouter le chieng a la session
            $walk = Walk::getUserWalk($id_consumer);
            $_SESSION['walk']=$walk;

        
            if ($response) {
                $errorArray['global'] = 'Votre profil est bien enregistré';
            }
        }
}



require_once(dirname(__FILE__) . '/../views/header.php');
require_once(dirname(__FILE__) . '/../views/createWalk.php');
require_once(dirname(__FILE__) . '/../views/footer.php');

