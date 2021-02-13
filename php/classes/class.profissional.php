<?php
include_once 'class.system.php';

class Profissional extends System {


	public function addRegistro($nome, $cpf, $salario, $categoria) {
		$db = $this->db;

		$sql = "SELECT vl_salario FROM tb_usuario WHERE cd_categoria = '$categoria'";
		$query = $db->query($sql);
		$query->num_rows;

		
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

	public function getAllCategories() {
		$db = $this->db;

		$sql = "SELECT nm_categoria FROM tb_categoria";
		$query = $db->query($sql);

		return $query;
	}

	public function apagarRegistro($cpf, $categoria) {
		$db = $this->db;


		$res = $this->atualizarMediaCategoria($categoria);
		if ($res) return true;
		return false;
	}	

}
?>
