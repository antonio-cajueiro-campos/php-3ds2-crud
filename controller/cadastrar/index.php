<?php
include_once 'php/main.php';
include_once 'php/classes/class.profissional.php';

$profissional = new Profissional($mysqli);

$categories = $profissional->getAllCategories();
$printCategories = "<option selected value='0'>Escolha a sua categoria</option>";

foreach ($categories as $category) {
	$cat = $category['nm_categoria'];
	$catId = $category['cd_categoria'];

	$template = "<option value='$catId'>$cat</option>";
	$printCategories .= $template;	
}

if (isset($_POST['cadastrar'])) {

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$categoria = $_POST['categoria'];
	$salario = $_POST['salario'];

	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace("-", "", $cpf);

	$salario = str_replace("R$", "", $salario);
	$salario = str_replace(",", "#", $salario);
	$salario = str_replace(".", "", $salario);
	$salario = str_replace("#", ".", $salario);

	if (!$profissional->consultarProfissional($cpf, 'valid')) {
		if ($profissional->addProfissional($nome, $cpf, $salario, $categoria)) {
			echo "<script>showAlert(0)</script>";
		} else {
			echo "<script>showAlert(2)</script>";			
		}
	} else {
		echo "<script>showAlert(1)</script>";
	}
}

?>
