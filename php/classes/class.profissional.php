<?php
include_once 'class.system.php';

class Profissional extends System {


	public function addProfissional($nome, $cpf, $salario, $categoria) {
		$db = $this->db;

		$sql = "INSERT INTO tb_usuario (cd_cpf, nm_profissional, cd_categoria, vl_salario) VALUES ('$cpf', '$nome', '$categoria', '$salario')";

		if ($db->query($sql)) {
			$res = $this->atualizarMediaCategoria($categoria);
			if ($res) return true;
			return false;
		}
		return false;		
	}

	public function removeProfissional($cpf, $categoria) {
		$db = $this->db;

		$sql = "DELETE FROM tb_usuario WHERE cd_cpf = '$cpf'";

		if ($db->query($sql)) {
			$res = $this->atualizarMediaCategoria($categoria);
			if ($res) return true;
			return false;
		}
		return false;
	}

	public function editarProfissional($nome, $cpf, $salario, $categoria) {
		$db = $this->db;


		$res = $this->atualizarMediaCategoria($categoria);
		if ($res) return true;
		return false;
	}

	public function consultarProfissional($cpf, $type) {
		$db = $this->db;

		switch ($type) {
			case 'categoria': $value = "cd_categoria"; break;
			case 'nome': $value = "nm_profissional"; break;
			case 'salario': $value = "vl_salario"; break;
		}
		$sql = "SELECT $value FROM tb_usuario WHERE cd_cpf = '$cpf'";

		$query = $db->query($sql);

		$row = $query->fetch_array(MYSQLI_ASSOC);

		$result = $row[$value];

		return $result;
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
}
?>
