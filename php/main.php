<?php
include_once "defines.php";
include_once "classes/class.system.php";
include_once "classes/class.routing.php";

$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
$system = new System($mysqli);
$routing = new Routing();

$router = $routing->setRouting(isset($_GET['p']) || "" ? $_GET['p'] : 'home');

$page_name = $routing->setPage('name', $router);
$page_desc = $routing->setPage('desc', $router);
$page_keywords = $routing->setPage('keyw', $router);
$page_abstract = $routing->setPage('abst', $router);

$navs = [
	'home', 'consultar', 'cadastrar', 'atualizar'
];

$navList = "";

foreach ($navs as $nav) {
	$activeStyles = 'active';
	if ($router != $nav) $activeStyles = "";
	$template = "
		<li class='nav-item $activeStyles'>
			<a class='nav-link' href='?p=$nav'>".ucwords($nav)."</a>
		</li>";
	$navList .= $template;
}

?>
