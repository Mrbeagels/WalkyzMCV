<?php
require_once(dirname(__FILE__) . '/../models/consumer.php');
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../config/database.php');

// Nettoyage de $search 
$search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
$nbrtotalelmnt= count(Consumer::getAll($search));
$limit = 10;
$nbPages = ceil($nbrtotalelmnt / $limit);
if($page == 0 || $page > $nbPages ){
    $page=1;
}
$offset = ($page-1)*$limit;
$consumers = Consumer::getAll($search, $offset, $limit);
// Calcul du nombre de pages
// Une fois le nombre total d'articles connu, nous pourrons calculer le nombre de pages nécessaires.

// Nous diviserons le nombre total d'articles par le nombre l'articles par page et nous arrondirons à l'entier supérieur.
// $perPage=10;
// $pages=ceil($nbConsumers/$parPage);
// $premier = ($currentPage*$parPage) -$parPage;


/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/header.php');
include(dirname(__FILE__) . '/../views/listConsumer.php');
include(dirname(__FILE__) . '/../views/footer.php');

/*************************************************************/
