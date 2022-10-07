<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/consumer.php');



// Initialisation du tableau d'erreurs
$errorsArray = array();
/*************************************/

// Nettoyage de l'id passé en GET dans l'url
$id_consumer = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
/*************************************************************/
// var_dump($id_consumer);
$consumer = Consumer::get($id_consumer);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        /*************************** MAIL **************************/
        //**** NETTOYAGE ****/
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

        //**** VERIFICATION ****/
        if (empty($mail)) {
            $errorsArray['mail'] = 'Le champ est obligatoire';
        } else {
            $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);
            if (!$isOk) {
                $errorsArray['mail'] = 'Le mail n\'est pas valide';
            }
            
        }
        //===================== civilité : Nettoyage et validation =======================
    
        $civility = intval(filter_input(INPUT_POST, 'civility', FILTER_SANITIZE_NUMBER_INT));
    
        if (!empty($civility)) {
            $testCivility = filter_var($civility, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 2)));
            if (!$testCivility) {
                $errorsArray["civility"] = "Merci de renseigner une civilité";
            }
        }
    
        //===================== Lastname : Nettoyage et validation =======================
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
        if(empty($lastname)){
            $errorsArray["lastname"] = "Merci de renseigner votre nom";
        }
        // On vérifie que ce n'est pas vide
    
        //===================== firstname : Nettoyage et validation =======================
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
        // On vérifie que ce n'est pas vide
        if(empty($firstname)){
            $errorsArray["firstname"] = "Merci de renseigner votre prénom";
        }
    
        //===================== birthdate : Nettoyage et validation =======================
        $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
        if(empty($birthdate)){
            $errorsArray["birthdate"] = "Merci de renseigner votre prénom";
        }
        //===================== walk_type : Nettoyage et validation =======================
        $walk_type = intval(filter_input(INPUT_POST, 'walk_type', FILTER_SANITIZE_NUMBER_INT));
    
        if (!empty($walk_type)) {
            $testWalk_type = filter_var($walk_type, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 4)));
            if (!$testWalk_type) {
                $errorsArray["walk_type"] = "Merci de choisir un type de balade";
            }
        }
    
        //===================== walk_time_slot : Nettoyage et validation =======================
        $walk_time_slot = intval(filter_input(INPUT_POST, 'walk_time_slot', FILTER_SANITIZE_NUMBER_INT));
    
        if (!empty($walk_time_slot)) {
            $testWalk_time_slot = filter_var($walk_time_slot, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 4)));
            if (!$testWalk_time_slot) {
                $errorsArray["walk_time_slot"] = "Merci de choisir une préférence de temps pour votre balade";
            }
        }
        //===================== walk_description : Nettoyage et validation =======================
        $walk_description = trim(filter_input(INPUT_POST, 'walk_description', FILTER_SANITIZE_SPECIAL_CHARS));
// var_dump($name);
var_dump($errorsArray);
        // Si il n'y a pas d'erreurs, on met à jour le patient.
        if (empty($errorsArray)) {
            var_dump("bonjou");
            //**** HYDRATATION ****/
            $consumer = new Consumer;
            $consumer->setCivility($civility);
            $consumer->setFirstname($firstname);
            $consumer->setLastname($lastname);
            $consumer->setBirthdate($birthdate);
            $consumer->setMail($mail);
            $consumer->setWalk_type($walk_type);
            $consumer->setWalk_time_slot($walk_time_slot);
            $consumer->setWalk_description($walk_description);
            $response = $consumer->update($id_consumer);
            var_dump($response);

            if($consumer){
                $errorsArray['global'] = MESSAGES[1];
            } else {
                $errorsArray['global'] = ERRORS[4];
            }    
        }
        // $consumer = Consumer::get($id_consumer);
        // $_SESSION['consumer']= $consumer;
    }


/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/header.php');
include(dirname(__FILE__) . '/../views/signUp.php');
include(dirname(__FILE__) . '/../views/footer.php');

/*************************************************************/
