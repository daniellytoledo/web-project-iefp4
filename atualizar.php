<?php
session_start();

require_once 'config.php'; // Inclui o arquivo com as senhas, neste caso estou usando o config porque coloquei no gitignore, mas pela aula, estariamos usando o require_once com o file conexao_db.php
require_once 'includes/funcoes.php'; // funções

// isset() função nativa do PHP que devolve True/False consoante a variável avaliada ($var) existe ou não

// 1º momento: listagem das cidades com id no <a href, selecionando cidades
$resposta = "";

// echo "Está página foi acedida por: " .$_SERVER["REQUEST_METHOD"] ."<br>"; // verificar por qual metodo a página está usando

if(!isset($_GET['cidade_id'])) {
    $sql       = "SELECT * FROM cidades"; // apenas lê as informações do banco de dados
    $stmt      = $conexao->query($sql); // envio da query pra base de dados
    $resposta  = $stmt->fetchAll();   // pega as informaçõs da cidade e transforma em array
}

// 2º momento: info da cidade escolhida. o stmt para preparar a conexão ajuda a evitar injection (alguém tentando invadir o bando de dados), ou seja, melhora a segurança do sistema
if(isset($_GET['cidade_id']) && $_SERVER["REQUEST_METHOD"]=="GET") {
    $sql          = "SELECT * FROM cidades WHERE id_c =?";
    $stmt         = $conexao->prepare($sql);
    $stmt->execute([$_GET['cidade_id']]);
    $dados_cidade = $stmt->fetch();
    $id           = $dados_cidade['id_c'];
    $nome         = $dados_cidade['nome_c'];
    $habitantes   = $dados_cidade['habitantes_c'];
    $pais         = $dados_cidade['pais_c'];
    $dataf        = $dados_cidade['dataf_c'];
    $descricao    = $dados_cidade['desc_c'];
}

// 3º momento: se o formulário foi recebido, então podemos editá-lo.

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['fnome'])) {
    $sql = "UPDATE cidades SET nome_c=?, pais_c=?, habitantes_c=?, dataf_c=?, desc_c=? WHERE id_c=?";

    $atArray = [
        $_POST['fnome'],
        $_POST['fpais'],
        $_POST['fhabitantes'],
        $_POST['fdata'],
        $_POST['fdescricao'],
        $_POST['fid'],
    ];

    $stmt = $conexao->prepare($sql);
    $stmt->execute($atArray);
    echo "Cidade Atualizada!";
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

        <p id="p_titulo_01" style="background-color: #2C9181; border-radius: 10px; padding: 5px; width: 25%;"> atualizar cidade </p>
        <br><br><br>

        <div>
            <!-- 1º passo listagem-->
            <?php if (!isset($_GET['cidade_id'])): ?>
                <?php foreach ($resposta as $cidade): ?>
                    <a href="atualizar.php?cidade_id=<?= $cidade['id_c'] ?>" class="lista-link"> <?= $cidade['nome_c'] ?> </a> <!-- aqui coloca a variável cidade e escolhe qual informação de cidade quero -->
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- 2º passo -->
            <?php if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET['cidade_id'])): ?>
                <form method="POST" action="">
                    <input type="hidden" name="fid" value="<?= $id?>">
                    <input type="text" name="fnome" placeholder="Nome da Cidade" class="class-input" value="<?= $nome?>" required><br><br>
                    <input type="text" name="fpais" placeholder="Nome do País" class="class-input" value="<?= $pais ?>" required><br><br>
                    <input type="number" name="fdata" placeholder="Data de Fundação" class="class-input" value="<?= $dataf ?>" required><br><br>
                    <input type="number" name="fhabitantes" placeholder="Número de Habitantes" class="class-input" value="<?= $habitantes ?>" required><br><br>
                    <textarea name="fdescricao" placeholder="Decrição" class="class-input" required><?= $descricao ?></textarea><br><br>
                    <input type="submit" value="Atualizar">
                    <input type="reset" value="Apagar">
                </form>
            <?php endif; ?>
            <br><br>
        </div>

    </main>

    <?php require_once 'includes/footer.php' ?>
    <?php require_once "includes/janela_aviso.php" ?>  

</body>

</html>