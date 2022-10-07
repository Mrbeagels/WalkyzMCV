<?php
require_once(dirname(__FILE__) . '/../models/consumer.php');

// Nettoyage de l'id du rdv passé en GET dans l'url
$id_consumer = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
var_dump($id_consumer);
$delete = Consumer::delete($id_consumer);
var_dump($delete);

// header('location: pages-controller.php'); 
// die;