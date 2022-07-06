<?php
include(dirname(__FILE__) . '/../config/config.php');
include(__DIR__.'/../views/header.php');
include(__DIR__.'/../views/signIn.php');


// Espace pour le PHP et la recupération des données du formulaire de contact.

// LE EMAIL MARCHE ¨PAS KLQSDJKSF UJED jkd jkQ JQj qssjd hbsfbhds fbh

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //===================== email : Nettoyage et validation =======================
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
$password = isset($_POST['password']);
$passwordConfirm = isset($_POST['passwordConfirm']);


// voir pour les MDP quand on apprend comment faire 


include(__DIR__.'/../views/home.php');
include(__DIR__.'/../views/footer.php');
?>