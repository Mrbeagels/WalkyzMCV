<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/consumer.php');
require_once __DIR__ . '/../helpers/JWT.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

 /*************************** MAIL **************************/
    //**** NETTOYAGE ****/
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    
    //**** VERIFICATION ****/
    if(empty($mail)){
        $error['mail'] = 'Le champ est obligatoire';
    } else {
        $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if(!$isOk){
            $error['mail'] = 'Le mail n\'est pas valide';
        }
        if(Consumer::isMailExists($mail)){
            $error['mail'] = 'Ce mail existe déjà';
        } 
    }


    // mdp 1 
    $password = $_POST['password'];
    // mdp 2 
    $password_verif = $_POST['passwordConfirm'];

    if(!empty($password_verif)){
    // Je m'assure que le mots de passe soit bien deux fois le meme 
    if ($password !== $password_verif) {
        $error['password'] = 'Les mots de passe ne sont pas identiques';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
}
    //===================== civilité : Nettoyage et validation =======================

    $civility = intval(filter_input(INPUT_POST, 'civility', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($civility)) {
        $testCivility = filter_var($civility, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 2)));
        if (!$testCivility) {
            $error["civility"] = "Merci de renseigner une civilité";
        }
    }

    //===================== Lastname : Nettoyage et validation =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));


    //===================== firstname : Nettoyage et validation =======================
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));


    //===================== birthdate : Nettoyage et validation =======================
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);

    //===================== walk_type : Nettoyage et validation =======================
    $walk_type = intval(filter_input(INPUT_POST, 'walk_type', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($walk_type)) {
        $testWalk_type = filter_var($walk_type, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 4)));
        if (!$testWalk_type) {
            $error["walk_type"] = "Merci de choisir un type de balade";
        }
    }

    //===================== walk_time_slot : Nettoyage et validation =======================
    $walk_time_slot = intval(filter_input(INPUT_POST, 'walk_time_slot', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($walk_time_slot)) {
        $testWalk_time_slot = filter_var($walk_time_slot, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 4)));
        if (!$testWalk_time_slot) {
            $error["walk_time_slot"] = "Merci de choisir une préférence de temps pour votre balade";
        }
    }
    //===================== walk_description : Nettoyage et validation =======================
    $walk_description = trim(filter_input(INPUT_POST, 'walk_description', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($walk_description)) {
        $testWalk_description = filter_var($walk_description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));

        if (!$testWalk_description) {
            $error["walk_description"] = "Votre description n'est pas conforme, merci de n'utiliser que des lettres et des chiffres.";
        }
    }

// var_dump($error);
    // Si il n'y a pas d'erreur et que les champs en require sont rempli on passe a l'enregistrement en BDD

    if (empty($error)) {
        // **HYDRATATION **/
        $consumer = new Consumer;
        $consumer->setCivility($civility);
        $consumer->setFirstname($firstname);
        $consumer->setLastname($lastname);
        $consumer->setBirthdate($birthdate);
        $consumer->setMail($mail);
        $consumer->setPassword($password);
        $consumer->setWalk_type($walk_type);
        $consumer->setWalk_time_slot($walk_time_slot);
        $consumer->setWalk_description($walk_description);
        $response = $consumer->insertConsumer();
        if($response){
            //envoi d'un mail avec lien contenant un jwt
            $subject = "Validez votre inscription";
            $payload = array('mail'=> $mail, 'exp'=>(time() + 3600));
            $token = JWT::generate($payload);
            $message = 'Merci de valider votre compte en cliquant sur ce lien: <a href="'.$_SERVER['HTTP_ORIGIN'].'/controllers/validateSignUp-controller.php?token='.$token.'">Cliquez-ici</a>';
            mail($mail, $subject, $message);
            header('location: /controllers/signin-controller.php');
            die;
        } else {
            $error['mail'] = 'Un problème est survenu';
        }
        if ($response) {
            $errorArray['global'] = 'Votre profil est bien enregistré';
        }
    }
    /*************************************************************/
}
include(__DIR__ . '/../views/header.php');
include(__DIR__ . '/../views/signUp.php');
include(__DIR__ . '/../views/footer.php');
