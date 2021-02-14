
async function removeProfissional(id) {
	await Swal.fire({
		title: 'Tem certeza que deseja excluir este profissional?',
		showDenyButton: true,
		showCancelButton: true,
		confirmButtonText: `Excluir`,
		denyButtonText: `Cancelar`,
	}).then(async (result) => {
		if (result.isConfirmed) {
			const data = await fetchServer("delete-profissional", {
				profId: id
			})
			if (data == "ok") {
				Swal.fire('Profissional excluido com sucesso', '', 'success')
				.then((e) => {
					location.reload();
				});
			} else {
				Swal.fire('Falha ao excluir profissional', '', 'warning')
			}
		}		
	})
}


// (script filename(PHP), parâmetros(objeto), method(GET/POST))
async function fetchServer(script = null, param = {}, method = "POST", timeout = 10) {
    let body = new FormData();
    for (let attr in param) {
        body.append(attr, param[attr]);
    }
    if (script != null) {
        script = `php/scripts/${script}.php`;
        const data = await fetch(script, { method, body, timeout })
        .then(async response => {
            if (!response.ok) {
                const status = await response.status;
                if (status == 200) {
                    console.log("Error: Server offline");
                    return false;
                }
                if (status == 404) {
                    console.log("Error: PHPScript not found");
                    return false;
                }
            } else {
                const data = await response.text();
                return data;
            }
        });
        return data;
    } else {
        console.log("Error: PHPScript not found, are you missing the filename?");
        return false;
    }   
}