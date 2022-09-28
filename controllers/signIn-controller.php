<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/consumer.php';
require_once __DIR__ . '/../models/dog.php';



// Espace pour le PHP et la recupération des données du formulaire de contact.


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //===================== email : Nettoyage et validation =======================
    $mail = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if (!empty($mail)) {
        $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format!!";
        }
    } else {
        $error["email"] = "L'adresse mail est obligatoire!!";
    }
}
$password = isset($_POST['password']);
$password_verif = isset($_POST['passwordConfirm']);

// Je m'assure que le mots de passe soit bien deux foi le meme 
if($password!==$password_verif){
    $errors['password'] = 'Les mots de passe ne sont pas identiques';
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
}





// voir pour les MDP quand on apprend comment faire 
include(__DIR__.'/../views/header.php');
include(__DIR__.'/../views/signIn.php');
include(__DIR__.'/../views/footer.php');
?>