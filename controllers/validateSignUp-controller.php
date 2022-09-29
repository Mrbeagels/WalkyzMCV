<?php

require_once __DIR__ . '/../helpers/JWT.php';
require_once __DIR__ . '/../models/consumer.php';

// Récupération des datas contenues dans le token
$datas = JWT::get($_GET['token']);

if($datas===false){
    $message = "Votre compte n'a pas pu etre vérifié"; 
} else {
    //Récupération de l'email contenu dans les datas
    $mail = $datas->mail;
    // Appel de la méthode de mise à jour du client (ajout de la date dans validated_at)
    if(Consumer::validate($mail)){
        $message = 'Votre compte est désormais validé!';
    } else {
        $message = 'Un problème s\'est produit lors de la validation de votre compte';
    }
}


include __DIR__ . '/../views/header.php';
include __DIR__ . '/../views/validateSignUp.php';
include __DIR__ . '/../views/footer.php';
