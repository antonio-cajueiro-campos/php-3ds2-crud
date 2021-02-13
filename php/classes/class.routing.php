<?php

class Routing {

	public function routerView($path) {
		switch ($path) {
			case 'consulta/index.php': return 'consulta';
			case 'home/index.php': return 'home';
			default: return 'home';
		}
	}

	public function setRouting($router = "home") {
		if (file_exists("view/".$router."/index.php") && file_exists("controller/".$router."/index.php") ) {
			return $router;
		} else {
			return "../php/errors/404/";
		}
	}

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
			case 'consulta':
				switch ($set) {
					case 'name': return "Consulta";
					case 'desc': return "Consulta de profissionais";
					case 'abst': return "";
					case 'keyw': return "consulta, profissionais, media";
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