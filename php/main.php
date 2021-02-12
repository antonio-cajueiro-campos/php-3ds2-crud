<?php
include_once "defines.php";
include_once "classes/class.system.php";
include_once "classes/class.routing.php";

$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
$system = new System($mysqli);
$routing = new Routing();

$router = $routing->setRouting(isset($_GET['p']) || "" ? $_GET['p'] : 'home');
$page = $routing->routerView($router);
$page_name = $routing->setPage('name', $page);
$page_desc = $routing->setPage('desc', $page);
$page_keywords = $routing->setPage('keyw', $page);
$page_abstract = $routing->setPage('abst', $page);

?>
