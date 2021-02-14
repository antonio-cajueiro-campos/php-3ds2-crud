
async function removeProfissional(id) {
	await Swal.fire({
		title: 'Tem certeza que deseja excluir este profissional?',
		showConfirmButton: true,
		showCancelButton: true,
		confirmButtonText: `Excluir`,
		cancelButtonText: `Cancelar`,
	}).then(async (result) => {
		if (result.isConfirmed) {
			const data = await fetchServer("delete-profissional", {
				profId: id
			})
            console.log(data);
			if (data == "ok") {
                showAlert(4);
			} else {
				showAlert(5);
			}
		}		
	})
}

function redirect(url) {
    location.href = url;
}

function redirectMsg(url, id) {
    let data = `showAlert(${id});`;
    localStorage.setItem('msgHtml', data);
    location.href = url;
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function showAfterMsg() {
    if (localStorage.getItem('msgHtml') !== null) {
        let data = localStorage.getItem('msgHtml');
        data = "<script type='text/javascript'>"+data+"</script>";
        $('.footer').html(data);
        await sleep(100);
        localStorage.removeItem('msgHtml');
    }  
}

function showAlert(id) {
    let msg, icon;
    switch (id) {
        case 0: msg = "Profissional adicionado com sucesso"; icon = "success"; break;
        case 1: msg = "CPF já cadastrado"; icon = "error"; break;
        case 2: msg = "Falha ao adicionar profissional"; icon = "error"; break;
        case 3: msg = ""; icon = "success"; break;
        case 4: msg = "Profissional excluido com sucesso"; icon = "success"; break;
        case 5: msg = "Falha ao excluir profissional"; icon = "error"; break;
        case 6: msg = "Perfil atualizado com sucesso!"; icon = "success"; break;
        case 7: msg = "Falha ao atualizar perfil"; icon = "error"; break;
        default: msg = "Erro desconhecido"; icon = "error"; break;
    }
    if (id == 4) {
        Swal.fire(msg, '', icon)
        .then((e) => {
            location.reload(true);
        });
    } else {
        Swal.fire(msg, '', icon);
    }
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
