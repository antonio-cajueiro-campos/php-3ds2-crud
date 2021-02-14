<?php
include_once 'php/main.php';
include_once 'php/classes/class.profissional.php';

$profissional = new Profissional($mysqli);

$categories = $profissional->getAllCategories();
$printList = "";


foreach ($categories as $category) {
	$catName = $category['nm_categoria'];
	$catId = $category['cd_categoria'];
	$catMedia = $category['vl_media_salarial'];
	$template = "
		<li class='list-group-item home-list' onclick=redirect('?p=consultar&category=$catId')>
			<div class='row'>
				<div class='col-6'>$catName</div>
				<div class='col-6'>$catMedia</div>
			</div>
		</li>
		";
	$printList .= $template;	
}
?>
