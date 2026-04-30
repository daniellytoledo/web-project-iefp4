<?php
require_once 'config.php'; // Inclui o arquivo com as senhas
require_once 'includes/funcoes.php'; // funções


?>

<!DOCTYPE html>
<html lang="pt">
<?php require_once 'includes/head.php' ?>

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
        <?php require_once 'includes/pesquisa_home.php' ?>

        <p id="p_titulo_01"> titulo </p>
        <br><br><br>

        <div id="desc_cidade">    
            <p> <strong>País:</strong> titulo 2
        </div>

    </main>

    <?php require_once 'includes/footer.php' ?>

</body>
</html>