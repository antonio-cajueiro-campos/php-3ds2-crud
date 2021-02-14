<?php
include_once 'class.system.php';

class Profissional extends System {

	// método para adicionar um profissional ao sistema
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

	// método para remover um profissional do sistema
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

	// método para atualizar as informações de um profissional
	public function updateProfissional($nome, $cpfOld, $cpfNew, $salario, $categoriaOld, $categoriaNew) {
		$db = $this->db;

		$sql = "UPDATE tb_usuario SET cd_cpf = '$cpfNew', nm_profissional = '$nome', vl_salario = '$salario', cd_categoria = '$categoriaNew' WHERE cd_cpf = '$cpfOld'";

		if ($db->query($sql)) {
			$res = $this->atualizarMediaCategoria($categoriaOld);
			if ($res) {
				$res = $this->atualizarMediaCategoria($categoriaNew);
				if ($res) return true;
			}
		}
		return false;
	}

	// método para consultar informações do profissional
	public function consultarProfissional($cpf, $type) {
		$db = $this->db;

		switch ($type) {
			case 'categoria': $value = "cd_categoria"; break;
			case 'nome': $value = "nm_profissional"; break;
			case 'salario': $value = "vl_salario"; break;
			case 'valid': $value = "cd_cpf"; break;
		}
		$sql = "SELECT $value FROM tb_usuario WHERE cd_cpf = '$cpf'";

		$query = $db->query($sql);

		if ($type == "valid") {
			if ($query->num_rows > 0)
			return true;
			else
			return false;
		}

		$row = $query->fetch_array(MYSQLI_ASSOC);

		$result = $row[$value];

		return $result;
	}

	// método para obter todas as categorias como mysqli object
	public function getAllCategories() {
		$db = $this->db;

		$sql = "SELECT * FROM tb_categoria ORDER BY nm_categoria";
		if ($query = $db->query($sql)) {
			return $query;
		} else {
			return false;
		}
	}

	// método para obter certas informações de categorias selecionadas
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

	// método para obter todos os profissionais de determinada categoria
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
