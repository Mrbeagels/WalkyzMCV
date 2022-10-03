<?php
require_once(dirname(__FILE__) . '/../models/dog.php');

// Nettoyage de l'id du rdv passé en GET dans l'url
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$delete = Dog_profil::delete($id);

header('location: listDog-controller.php'); 
die;