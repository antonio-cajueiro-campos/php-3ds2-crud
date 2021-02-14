<?php
include_once 'php/main.php';
include_once 'php/classes/class.profissional.php';

$profissional = new Profissional($mysqli);

$categories = $profissional->getAllCategories();

$printList = "";
$printCategories = "<option selected value=''>Escolha a sua categoria</option>";

foreach ($categories as $category) {
	$catName = $category['nm_categoria'];
	$catId = $category['cd_categoria'];

	$templateSelect = "<option value='$catId'>$catName</option>";
	
	$printCategories .= $templateSelect;
}

if (isset($_GET['category']) && $_GET['category'] != "") {
	$categoryId = $_GET['category'];
	$categoryName = $profissional->getCategorie($categoryId, 'name');
	$categoryMedia = $profissional->getCategorie($categoryId, 'media');

	$categoryMedia = str_replace(".", ",", $categoryMedia);

	$profs = $profissional->getAllProInCategories($categoryId);

	
	foreach ($profs as $prof) {
		$profId = $prof['cd_cpf'];
		$profName = $prof['nm_profissional'];
		$profSalario = $prof['vl_salario'];

		$profSalario = str_replace(".", ",", $profSalario);
		
		$templateList = "
			<li class='list-group-item proItem'>
				<div class='row'>
					<div class='col-6'>$profName</div>
					<div class='col-4'>R$ $profSalario</div>
					<div class='col-1 icon-box'><a href='?p=atualizar&id=$profId'><i class='fa fa-cog icon cog' aria-hidden='true'></i></a></div>
					<div class='col-1 icon-box'><i onclick=removeProfissional($profId) class='fa fa-times icon times'></i></div>
				</div>
			</li>";
	
		$printList .= $templateList;
	}
}

?>
