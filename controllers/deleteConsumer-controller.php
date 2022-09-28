<?php
require_once(dirname(__FILE__) . '/../models/consumer.php');

// Nettoyage de l'id du rdv passé en GET dans l'url
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$delete = Consumer::delete($id);

header('location: listConsumer-controller.php'); 
die;