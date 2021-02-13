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

		$sql = "SELECT * FROM tb_categoria ORDER BY nm_categoria";
		if ($query = $db->query($sql)) {
			return $query;
		} else {
			return false;
		}
	}

	public function getCategorie($id, $type = null) {
		$db = $this->db;

		switch ($type) {
			case 'name': $value = "nm_categoria"; break;
			case 'media': $value = "vl_media_salarial"; break;
		}
		$sql = "SELECT $value FROM tb_categoria WHERE cd_categoria = '$id'";

		$query = $db->query($sql);

		$row = $query->fetch_array(MYSQLI_ASSOC);

		$result = $row[$value];

		return $result;

	}

	public function getAllProInCategories($categoryId) {
		$db = $this->db;

		$sql = "SELECT * FROM tb_usuario WHERE cd_categoria='$categoryId' ORDER BY nm_profissional";
		if ($query = $db->query($sql)) {
			return $query;
		} else {
			return false;
		}
	}

	public function apagarRegistro($cpf, $categoria) {
		$db = $this->db;


		$res = $this->atualizarMediaCategoria($categoria);
		if ($res) return true;
		return false;
	}	

}
?>
