<?php
include_once 'class.system.php';

class Profissional extends System {

	public function addRegistro($nome, $cpf, $salario, $categoria) {
		$db = $this->db;

		
		$res = $this->atualizarMediaCategoria($categoria);
		if ($res) return true;
		return false;
	}

	public function editarRegistro($nome, $cpf, $salario, $categoria) {
		$db = $this->db;


		$res = $this->atualizarMediaCategoria($categoria);
		if ($res) return true;
		return false;
	}

	public function consultarRegistro($cpf) {
		$db = $this->db;

	}

	public function apagarRegistro($cpf, $categoria) {
		$db = $this->db;


		$res = $this->atualizarMediaCategoria($categoria);
		if ($res) return true;
		return false;
	}	

}
?>
