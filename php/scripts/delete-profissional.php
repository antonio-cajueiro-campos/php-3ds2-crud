<?php
include_once "../main.php";
include_once "../classes/class.profissional.php";

if (isset($_POST['profId'])) {
	$prof = new Profissional($mysqli);

	$profId = $_POST['profId'];

	$categoria = $prof->consultarProfissional($profId, 'categoria');

	if ($prof->removeProfissional($profId, $categoria)) {
		echo "ok";
	} else {
		echo "error";
	}
}


?>
