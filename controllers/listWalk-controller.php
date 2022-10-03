<?php
require_once(dirname(__FILE__) . '/../config/config.php');
require_once(dirname(__FILE__) . '/../models/walk.php');
require_once(dirname(__FILE__) . '/../config/database.php');



// Nettoyage de $search 
$search = trim((string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

$page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

$nbrtotalelmnt= count(Walk::getAll($search));

$limit = 10;

$nbPages = ceil($nbrtotalelmnt / $limit);

if($page == 0 || $page > $nbPages ){
    $page=1;
}

$offset = ($page-1)*$limit;

$walks = Walk::getAll($search, $offset, $limit);







/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/header.php');
include(dirname(__FILE__) . '/../views/listWalk.php');
include(dirname(__FILE__) . '/../views/footer.php');