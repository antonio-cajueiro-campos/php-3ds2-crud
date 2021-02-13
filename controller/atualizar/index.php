<?php
include_once 'php/main.php';
include_once 'php/classes/class.profissional.php';

$profissional = new Profissional($mysqli);

$categories = $profissional->getAllCategories();
$printCategories = "<option selected value=''>Escolha a sua categoria</option>";

foreach ($categories as $category) {
	$cat = $category['nm_categoria'];
	$template = "<option value='$cat'>$cat</option>";
	$printCategories .= $template;	
}
?>
