<?php
require_once(dirname(__FILE__) . '/../models/walk.php');

// Nettoyage de l'id du rdv passé en GET dans l'url
$id_walk = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$_SESSION['walk']= walk::getUserWalk($id_walk);
$id_walk = $_SESSION['walk']->id_walk;
$delete = Walk::delete($id_walk);
var_dump($_SESSION);
header('location: listWalk-controller.php'); 
die;