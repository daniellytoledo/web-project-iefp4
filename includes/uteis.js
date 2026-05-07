function confirmaEliminar(cidade) {
    let mensagem = "Tem certeza que pretense eliminar a cidade " + cidade + "?";
    let href= "eliminar.php?cidade_id=" +id;

    console.log(cidade);
    console.log(id);
    document.getElementById("janelaAvisos_id").style.display = "block";
    document.getElementById("aviso_id").innerText = mensagens;
    document.getElementById("aviso_ok_id").href = href;
}

function removerJanelaAviso() {
    document.getElementById("janelaAvisos_id").style.display = "none";
}