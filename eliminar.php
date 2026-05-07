<?php
require_once 'config.php'; // Inclui o arquivo com as senhas, neste caso estou usando o config porque coloquei no gitignore, mas pela aula, estariamos usando o require_once com o file conexao_db.php
require_once 'includes/funcoes.php'; // funções

// isset() função nativa do PHP que devolve True/False consoante a variável avaliada ($var) existe ou não

// 1º momento: listagem das cidades com id no <a href, selecionando cidades
$resposta = "";

if(!isset($_GET['cidade_id'])) {
    $sql       = "SELECT * FROM cidades"; // apenas lê as informações do banco de dados
    $stmt      = $conexao->query($sql); // envio da query pra base de dados
    $resposta  = $stmt->fetchAll();   // pega as informaçõs da cidade e transforma em array
}

// 2º momento: info da cidade escolhida. o stmt para preparar a conexão ajuda a evitar injection (alguém tentando invadir o bando de dados), ou seja, melhora a segurança do sistema
if(isset($_GET['cidade_id']) && $_SERVER["REQUEST_METHOD"]=="GET") {
    $sql  = "DELETE FROM cidades WHERE id_c=?";
    $stmt = $conexao->prepare($sql);
    /* $array = [$_GET['cidade_id']];
    $stmt->execute($array) isso é o mesmo que o único comando abaixo: */
    $stmt->execute($_GET['cidade_id']); 
}

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

        <p id="p_titulo_01" style="background-color: #2C9181; border-radius: 10px; padding: 5px; width: 25%;"> eliminar cidade </p>
        <br><br><br>

        <div>
            <!-- 1º passo listagem-->
            <?php if (!isset($_GET['cidade_id'])): ?>
                <?php foreach ($resposta as $cidade): ?>
                    <a href="eliminar.php?cidade_id=<?= $cidade['id_c'] ?>" class="lista-link"> <?= $cidade['nome_c'] ?> </a> <!-- aqui coloca a variável cidade e escolhe qual informação de cidade quero -->
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </main>

    <?php require_once 'includes/footer.php' ?>

</body>

</html>