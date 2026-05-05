<?php
require_once 'config.php'; // Inclui o arquivo com as senhas, neste caso estou usando o config porque coloquei no gitignore, mas pela aula, estariamos usando o require_once com o file conexao_db.php
require_once 'includes/funcoes.php'; // funções

// isset() função nativa do PHP que devolve True/False consoante a variável avaliada ($var) existe ou não

if(isset($_POST['fnome'])) {
    $sql= "INSERT INTO cidades (nome_c, pais_c, habitantes_c, dataf_c, desc_c) VALUES (?, ?, ?, ?, ?)";

    $addArray = [
        $_POST['fnome'],
        $_POST['fpais'],
        $_POST['fhabitantes'],
        $_POST['fdata'],
        $_POST['fdescricao']
    ];

    $stmt = $conexao->prepare($sql);
    $stmt-> execute($addArray);

    echo "Cidade adicionada.";
} // inserindo dados no banco de dados real do SQL caso o isset devolve como True, dizendo que existe um formulário enviado pelo adicionar da página

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

        <p id="p_titulo_01"> adicionar cidade </p>
        <br><br><br>

        <div>
            <form method="POST" action="">
                <input type="text" name="fnome" placeholder="Nome da Cidade" class="class-input"><br><br>
                <input type="text" name="fpais" placeholder="Nome do País" class="class-input"><br><br>
                <input type="number" name="fdata" placeholder="Data de Fundação" class="class-input"><br><br>
                <input type="number" name="fhabitantes" placeholder="Número de Habitantes" class="class-input"><br><br>
                <textarea name="fdescricao" placeholder="Decrição" class="class-input"></textarea><br><br>
                <input type="submit" value="Adicionar">
                <input type="reset" value="Apagar">
            </form>
            <br><br>

        </div>

    </main>

    <?php require_once 'includes/footer.php' ?>

</body>
</html>