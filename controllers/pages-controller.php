<?php
require_once __DIR__ . '/../config/config.php';

var_dump($_SESSION);

include(__DIR__.'/../views/header.php');
include(__DIR__.'/../views/home.php');
include(__DIR__.'/../views/footer.php');
?>