<?php
require_once(dirname(__FILE__) . '/../models/walk.php');

// Nettoyage de l'id du rdv passé en GET dans l'url
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$id_walk = $_SESSION['walk']->id_walk;
$delete = Walk::delete($id_walk);

header('location: listWalkConsumer-controller.php'); 
die;