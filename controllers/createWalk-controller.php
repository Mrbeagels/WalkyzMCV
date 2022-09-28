<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/consumer.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // name de la balade
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    if (!empty($name)) {
        $testRegex = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
    }if (!$testRegex) {
        $error["lastname"] = "Le nom n'est pas au bon format!!";
    }

    //===================== zipCode : Nettoyage et validation =======================
    $zipCode = trim(filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($zipCode)) {
        $testRegex = filter_var($zipCode, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
        if (!$testRegex) {
            $error["zipCode"] = "Vous devez entrer un code postal valide";
        }
    }

    // city
    $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_NUMBER_INT));

    // Adresse
    $address= trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_NUMBER_INT));

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

        // durée
        $duration = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS);

}









require_once(dirname(__FILE__) . '/../views/header.php');
require_once(dirname(__FILE__) . '/../views/createWalk.php');

