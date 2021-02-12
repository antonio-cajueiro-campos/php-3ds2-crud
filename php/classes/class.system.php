<?php
class System {
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function atualizarMediaSalarial($categoria) {
		$db = $this->db;
		$sql = "SELECT vl_salario FROM tb_usuario WHERE cd_categoria = '$categoria'";

		$soma = 0;
		$query=$db->query($sql);
		if ($query->num_rows != 0) {
			foreach ($query as $registro) {
				$soma += $registro['vl_salario'];
			}
			$media = $soma / $query->num_rows;

			$sql="UPDATE tb_categoria SET vl_media_salarial = '$media' WHERE cd_categoria = '$categoria'";

			if($db->query($sql)){
				return true;
			} else {
				return false;
			}
		}		
	}
}
?>
