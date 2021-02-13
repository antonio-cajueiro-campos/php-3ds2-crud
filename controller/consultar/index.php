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

// $params           = array_merge($_GET, ['p' => $router]);
// echo $new_query_string = http_build_query( $params );

if (isset($_GET['category'])) {
	$categoryId = $_GET['category'];
	$categoryName = $profissional->getCategorie($categoryId, 'name');
	$categoryMedia = $profissional->getCategorie($categoryId, 'media');

	$profs = $profissional->getAllProInCategories($categoryId);

	
	foreach ($profs as $prof) {
		$profName = $prof['nm_profissional'];
		$profSalario = $prof['vl_salario'];
		
		$templateList = "
			<li class='list-group-item'>
				<div class='row'>
					<div class='col-6'>$profName</div>
					<div class='col-6'>$profSalario</div>
				</div>
			</li>";
	
		$printList .= $templateList;
	}
}

?>
