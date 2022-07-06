<?php
include(dirname(__FILE__) . '/../config/config.php');
include(__DIR__.'/../views/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // probleme avec la modale 

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (!empty($email)) {
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format!!";
        }
    } else {
        $error["email"] = "L'adresse mail est obligatoire!!";
    }

}


include(__DIR__.'/../views/forgotPassword.php');
include(__DIR__.'/../views/home.php');
include(__DIR__.'/../views/footer.php');
?>