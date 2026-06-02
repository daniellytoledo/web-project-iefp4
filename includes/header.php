    <header>
        <div class="navbar_header">
            <img src="imgs/imgs/logo.png" alt="logo" id="img_logo">

            <p id="slogan">
                Projeto Camalheia :: viaje pelo mundo ficando alojado na cama... alheia.
            </p>
            <?php if(!isset($_SESSION['utilizador_id'])): ?>
                <form action="" name="form_login" method="POST" enctype="application/x-www-form-urlencoded">
                    <input type="text" name="Login" placeholder="user">
                    <input type="password" name="pass" placeholder="password">
                    <input type="submit" value="entrar" class="button_entrar">
                </form>
            <?php endif; ?>

            <?php
            if(isset($_SESSION['utilizador_id'])) {
                $utilizador         = $_POST['fuser'];
                $saudacao           = "Olá $utilizador.";
                $logout             = "<a href='logout.php'>Logout</a>";
                $saudacaoLogin      = $saudacao . $logout; // o ponto . é concatenização pra juntar as duas variáveis
                echo $saudacaoLogin;
            }
            ?>
        </div>
    </header>