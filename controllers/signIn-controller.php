<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/consumer.php';
require_once __DIR__ . '/../models/dog.php';



// Espace pour le PHP et la recupération des données du formulaire de contact.


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];
    

    // Récupération de toutes les infos du user en fonction de son email.
    $consumer = Consumer::getByEmail($mail);
    
    $password_hash = $consumer->password;
    
    // Cette fonction native renvoie un bool si le password en clair est reconnu dans le password_hash
    $isConsumerVerified = password_verify($password, $password_hash);
    
    if(!$isConsumerVerified){
        $errors['global'] = 'Problème de login';
    } else {
        // Si la colonne validate_at est à NULL c'est que l'utilisateur n'a pas encore validé son compte
        if(is_null($consumer->validated_at)){
            $errors['global'] = 'Votre compte n\'est pas encore validé';
        } else {
            $_SESSION['consumer'] = $consumer;
            header('location:/controllers/pages-controller.php');
        }

    }
}





// voir pour les MDP quand on apprend comment faire 
include(__DIR__.'/../views/header.php');
include(__DIR__.'/../views/signIn.php');
include(__DIR__.'/../views/footer.php');
?>