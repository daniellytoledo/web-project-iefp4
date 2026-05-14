function confirmaEliminar(cidade,id){
    let mensagem = "Tem a certeza que pretende eliminar a cidade " + cidade + "?";
    let href= "eliminar.php?cidade_id=" + id;
    
    document.getElementById("textoAviso_id").innerText = mensagem;
    document.getElementById("aviso_ok_id").href = href;
    document.getElementById("janelaAvisos_id").style.display = "block";
}

function removerJanelaAviso(){ 
    document.getElementById("janelaAvisos_id").style.display = "none";
}