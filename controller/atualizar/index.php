<?php
include_once 'php/main.php';
include_once 'php/classes/class.profissional.php';

$profissional = new Profissional($mysqli);

$categories = $profissional->getAllCategories();
$isValid = false;

$printCategories = "<option selected value='0'>Escolha a sua categoria</option>";

foreach ($categories as $category) {
	$catId = $category['cd_categoria'];
	$cat = $category['nm_categoria'];
	
	$template = "<option value='$catId'>$cat</option>";
	$printCategories .= $template;	
}


if (isset($_GET['id']) && $_GET['id'] != "") {
	$cpf = $_GET['id'];
	$isValid = $profissional->consultarProfissional($cpf, 'valid');	

	if ($isValid) {
		$categoria = $profissional->consultarProfissional($cpf, 'categoria');
		$nome = $profissional->consultarProfissional($cpf, 'nome');
		$salario = $profissional->consultarProfissional($cpf, 'salario');
	}
}

if (isset($_POST['atualizar'])) {
	
	$nome = $_POST['nome'];
	$salario = $_POST['salario'];
	$cpf = $_POST['cpf'];
	$categoria = $_POST['categoria'];

	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace("-", "", $cpf);

	$salario = str_replace("R$", "", $salario);
	$salario = str_replace(",", "#", $salario);
	$salario = str_replace(".", "", $salario);
	$salario = str_replace("#", ".", $salario);

	if ($profissional->updateProfissional($nome, $cpf, $salario, $categoria)) {
		echo "<script>showAlert(6);</script>";
	} else {
		echo "<script>showAlert(7);</script>";
	}
}
?>
