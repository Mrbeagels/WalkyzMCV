<?php
require_once(dirname(__FILE__) . '/../models/dog.php');

// Nettoyage de l'id du rdv passé en GET dans l'url
$id_consumer = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
var_dump($id_consumer);
$delete = Dog_profil::delete($id_consumer);

header('location: pages-controller.php'); 
die;