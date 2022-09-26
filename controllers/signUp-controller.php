<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/user.php');


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
    if($password!==$password_verif){
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
        if(!$birthdateObj){
            $error["birthdate"] = "La date entrée n'est pas valide!";
        } else {
            $diff = $birthdateObj->diff($currentDateObj);
            $age = $diff->days/365;
            if (!$birthdateObj || $diff->invert == 1 || $birthdateObj->format('Y-m-d') !== $birthdate || $age==0 || $age>120) {
                $error["birthdate"] = "La date entrée n'est pas valide!";
            }
        }
    }

        //===================== zipCode : Nettoyage et validation =======================
        $zipCode = trim(filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_NUMBER_INT));

        if (!empty($zipCode)) {
            $testRegex = filter_var($zipCode, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
            if (!$testRegex) {
                $error["zipCode"] = "Vous devez entrer un code postal valide";
            }
        }


       //===================== Ville : Nettoyage et validation =======================
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS));

        if(!empty($city)){
            $testRegex = filter_var($city, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
            if(!$testRegex){
                $error["city"] = "le nom de ville n'est pas conforme";
            } else {
                if(strlen($city) <= 1 || strlen($city)>= 70){
                    $error['city']= "la longueur de la ville n'est pas bonne";
                }
            }
        } else {
            $error["city"]= "Merci de renseigner un nom de ville";
        }

          //===================== address : Nettoyage et validation =======================
        $address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS));

        // if(!empty($address)){
        //     $testRegex = filter_var($address, FILTER_VALIDATE_REGEXP,array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
        //     // var_dump($testRegex); die;
        //     if(!$testRegex)
        //     {
        //         $error["address"] = "Votre adresse n'est pas conforme";
        //     } else 
        //     {
        //     $error["address"]= "Merci de renseigner un nom de ville";
        //     }
        // }



// Si il n'y a pas d'erreur et que les champs en require sont rempli on passe a l'enregistrement en BDD

    if(empty($error)){
        // **HYDRATATION **/
        $user = new Users;
        $user->setCivility($civility);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setBirthdate($birthdate);
        $user->setAddress($address);
        // $user->setProfilPictures($profilPictures);
        // $user->setRole($role);
        $user->setMail($mail);
        $response = $user->insertUser();

        if($response){
            $errorArray['global']='Votre profil est bien enregistré';
        }
    }
    /*************************************************************/

    
}
include(__DIR__.'/../views/header.php');
include(__DIR__.'/../views/signUp.php');
include(__DIR__.'/../views/footer.php');
