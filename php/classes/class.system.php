<?php
class System {

	protected $db;

	private $mediaPadrao = [
		1 => '1111', 2 => '1111', 3 => '1111', 4 => '1111', 5 => '1111', 6 => '1111', 7 => '1111', 8 => '1111', 9 => '1111', 10 => '1111',
		11 => '1111', 12 => '1111', 13 => '1111', 14 => '1111', 15 => '1111', 16 => '1111', 17 => '1111', 18 => '1111', 19 => '1111', 20 => '1111',
		21 => '1111', 22 => '1111', 23 => '1111', 24 => '1111', 25 => '1111', 26 => '1111', 27 => '1111', 28 => '1111', 29 => '1111', 30 => '1111',
		31 => '1111', 32 => '1111', 33 => '1111', 34 => '1111', 35 => '1111', 36 => '1111', 37 => '1111', 38 => '1111', 39 => '1111', 40 => '1111',
		41 => '1111', 42 => '1111', 43 => '1111', 44 => '1111', 45 => '1111', 46 => '1111', 47 => '1111', 48 => '1111', 49 => '1111', 50 => '1111',
		51 => '1111', 52 => '1111', 53 => '1111', 54 => '1111', 55 => '1111'
	];

	public function __construct($db) {
		$this->db = $db;
	}

	// método para atualizar a média de cada categoria
	protected function atualizarMediaCategoria($categoria) {
		$db = $this->db;
		$sql = "SELECT vl_salario FROM tb_usuario WHERE cd_categoria = '$categoria'";

		$soma = 0;
		$query = $db->query($sql);

		foreach ($query as $registro) {
			$soma += $registro['vl_salario'];
		}

		if ($query->num_rows >= 1) {
			$media = $soma / $query->num_rows;
		} else {
			$media = 0;
		}

		$sql="UPDATE tb_categoria SET vl_media_salarial = '$media' WHERE cd_categoria = '$categoria'";

		if($db->query($sql)){
			return true;
		} else {
			return false;
		}
	}
}
?>
