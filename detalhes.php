<?php
require_once 'config.php'; // Inclui o arquivo com as senhas
require_once 'includes/funcoes.php'; // funções

$SQL = "SELECT * FROM cidades WHERE id_c=?";
$stmt = $conexao -> prepare($SQL);
$stmt -> execute([$_GET['cidade']]);
$resultado = $stmt -> fetch();

$cidade    = $resultado['nome_c'];
$nhabit    = $resultado['habitantes_c'];
$pais      = $resultado['pais_c'];
$fundacao  = $resultado['dataf_c'];
$descricao = $resultado['desc_c'];

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camalheia</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="navbar_header">
            <img src="imgs/imgs/logo.png" alt="logo" id="img_logo">

            <p id="slogan">
                Projeto Camalheia :: viaje pelo mundo ficando alojado na cama... alheia.
            </p>

            <form action="" name="form_login" method="POST" enctype="application/x-www-form-urlencoded">
                <input type="text" name="Login" placeholder="user">
                <input type="password" name="pass" placeholder="password">
                <input type="submit" value="entrar" class="button_entrar">
            </form>

        </div>

    </header>

    <main>
        <div id="navbar_pesquisa">
            <form action="" name="form_pesquisa" method="GET" enctype="application/x-www-form-urlencoded">
                <input type="text" name="pesquisa">
                <input type="submit" value="pesquisar" class="button_pesquisar">
            </form>
        </div>

        <p id="p_titulo_01"> <?= $cidade ?> </p>

        <div class="flex_box">    
                     
        </div>
    </main>

    <footer>
        O projeto Camalheia é exclusivamente patrocinado por Durex Lda, Harmony SA e Control Lda.
    </footer>

</body>
</html>