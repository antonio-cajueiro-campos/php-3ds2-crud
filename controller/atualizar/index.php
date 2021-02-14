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
	
	$nomeP = $_POST['nome'];
	$salarioP = $_POST['salario'];
	$cpfP = $_POST['cpf'];
	$categoriaP = $_POST['categoria'];

	$cpfP = str_replace(".", "", $cpfP);
	$cpfP = str_replace("-", "", $cpfP);

	$salarioP = str_replace("R$", "", $salarioP);
	$salarioP = str_replace(",", "#", $salarioP);
	$salarioP = str_replace(".", "", $salarioP);
	$salarioP = str_replace("#", ".", $salarioP);
	
	if ($cpf != $cpfP) {
		if (!$profissional->consultarProfissional($cpfP, 'valid')) {
			if ($profissional->updateProfissional($nomeP, $cpf, $cpfP, $salarioP, $categoriaP)) {
				echo "<script>redirectMsg('?p=atualizar&id=$cpfP', 6);</script>";
			} else {
				echo "<script>showAlert(7);</script>";
			}
		} else {
			echo "<script>showAlert(1);</script>";
		}
	} else {
		if ($profissional->updateProfissional($nomeP, $cpf, $cpfP, $salarioP, $categoriaP)) {
			echo "<script>redirectMsg('?p=atualizar&id=$cpfP', 6);</script>";
		} else {
			echo "<script>showAlert(7);</script>";
		}
	}
}
?>
