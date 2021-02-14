<?php
class Routing {

	// método para verificar se a rota existe e retornar erro 404 caso não exista
	public function setRouting($router) {
		if (file_exists("view/".$router."/index.php") && file_exists("controller/".$router."/index.php"))
			return $router;
		else
			return "../php/errors/404/";
	}

	// método para setar os meta de cada página
	public function setPage($set, $page) {
		switch ($page) {
			case 'home':
				switch ($set) {
					case 'name': return "Inicio";
					case 'desc': return "Venha conhecer a nossa homepage";
					case 'abst': return "Come to brazil";
					case 'keyw': return "página inicial, home, media, profissional, ti, salario";
				}
			break;
			case 'consultar':
				switch ($set) {
					case 'name': return "Consultar";
					case 'desc': return "Consulta de profissionais";
					case 'abst': return "Come to brazil";
					case 'keyw': return "consultar, profissionais, media";
				}
			break;
			case 'cadastrar':
				switch ($set) {
					case 'name': return "Cadastrar";
					case 'desc': return "Cadastrar de profissionais";
					case 'abst': return "Come to brazil";
					case 'keyw': return "cadastrar, profissionais, media";
				}
			break;
			case 'atualizar':
				switch ($set) {
					case 'name': return "Atualizar";
					case 'desc': return "Atualizar de profissionais";
					case 'abst': return "Come to brazil";
					case 'keyw': return "atualizar, profissionais, media";
				}
			break;
			default:
				switch ($set) {
					case 'name': return "404";
					case 'desc': return "";
					case 'abst': return "";
					case 'keyw': return "";
				}
			break;
		}
	}
}
?>
