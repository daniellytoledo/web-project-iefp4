<!-- <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        echo "Vai fazer login para a tua terra, pá!";
        var_dump($_POST);
    }
?> se colocar um usuário que não existe, vai voltar esse erro echo -->

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camalheia</title>
    <link rel="stylesheet" href="styles.css">
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
                <input type="submit" value="entrar">
            </form>
        </div>

    </header>

    <main>
        <div id="navbar_pesquisa">
            <form action="" name="form_pesquisa" method="GET" enctype="application/x-www-form-urlencoded">
                <input type="text" name="pesquisa">
                <input type="submit" value="pesquisar">
            </form>
        </div>

        conteúdo do meio da tala

        <div class="flex_box"> 4 caixinhas </div>
    </main>

    <footer>
        O projeto Camalheia é exclusivamente patrocinado por Durex Lda, Harmony SA e Control Lda.
    </footer>

</body>
</html>