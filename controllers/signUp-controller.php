<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/consumer.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // php des formulaire
    //===================== email : Nettoyage et validation =======================
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    if (!empty($mail)) {
        $testEmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format!!";
        }
    } else {
        $error["email"] = "L'adresse mail est obligatoire!!";
    }

    // mdp 1 
    $password = isset($_POST['password']);
    // mdp 2 
    $password_verif = isset($_POST['passwordConfirm']);

    // Je m'assure que le mots de passe soit bien deux fois le meme 
    if ($password !== $password_verif) {
        $errors['password'] = 'Les mots de passe ne sont pas identiques';
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }


    //===================== civilité : Nettoyage et validation =======================

    $civility = intval(filter_input(INPUT_POST, 'civility', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($civility)) {
        $testCivility = filter_var($civility, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 2)));
        if (!$testCivility) {
            $error["civility"] = "Merci de renseigner une civilité0";
        }
    }

    //===================== Lastname : Nettoyage et validation =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($lastname)) {
        $testRegex = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["lastname"] = "Le nom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($lastname) <= 1 || strlen($lastname) >= 70) {
                $error["lastname"] = "La longueur du nom n'est pas bon";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["lastname"] = "Vous devez entrer un nom!!";
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
// var_dump($mail, $password, $password_verif, $civility, $lastname, $firstname, $birthdate, $walk_type, $walk_time_slot, $walk_description); die;


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

        // var_dump($consumer,$response); die;
        if ($response) {
            $errorArray['global'] = 'Votre profil est bien enregistré';
        }
    }
    /*************************************************************/
}
include(__DIR__ . '/../views/header.php');
include(__DIR__ . '/../views/signUp.php');
include(__DIR__ . '/../views/footer.php');
