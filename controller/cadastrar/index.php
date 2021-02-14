<?php
include_once 'php/main.php';
include_once 'php/classes/class.profissional.php';

$profissional = new Profissional($mysqli);

$categories = $profissional->getAllCategories();
$printCategories = "<option selected value=''>Escolha a sua categoria</option>";

foreach ($categories as $category) {
	$cat = $category['nm_categoria'];
	$catId = $category['cd_categoria'];

	$template = "<option value='$catId'>$cat</option>";
	$printCategories .= $template;	
}

if (isset($_POST['cadastrar'])) {

	echo $nome = $_POST['nome'];
	echo $cpf = $_POST['cpf'];
	echo $categoria = $_POST['categoria'];
	echo $salario = $_POST['salario'];
	
	var_dump($profissional->addProfissional($nome, $cpf, $salario, $categoria));
}

?>
