<?php
require_once 'config.php'; // Inclui o arquivo com as senhas
require_once 'includes/funcoes.php'; // funções

$SQL       = "SELECT * FROM cidades WHERE id_c=?";
$stmt      = $conexao -> prepare($SQL);
$stmt     -> execute([$_GET['cidade']]);
$resultado = $stmt -> fetch();

$cidade    = $resultado['nome_c'];
$nhabit    = $resultado['habitantes_c'];
$pais      = $resultado['pais_c'];
$fundacao  = $resultado['dataf_c'] >= 0 ? $resultado['dataf_c'] : abs($resultado['dataf_c']). " A.C.";
$descricao = $resultado['desc_c'];

$SQL       = "SELECT img_f FROM fotos WHERE cidade_f = ?";
$stmt      = $conexao->prepare($SQL);
$stmt     -> execute([$_GET['cidade']]);
$fotos     = $stmt->fetchAll();


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

        <p id="p_titulo_01"> <?= $cidade ?> </p>
        <br><br><br>

        <div id="desc_cidade">    
            <p> <strong>País:</strong> <?= $pais ?>
            <p> <strong>Habitantes:</strong> <?= $nhabit ?> 
            <p> <strong>Fundação:</strong> <?= $fundacao ?> 
                <p> <?= $descricao ?> </p>
                <br><br>
                <div class="flex_box">
                    <?php foreach($fotos as $foto): ?>
                    <img src="imgs/imgs/cidades/<?= $foto['img_f'] ?>" class="miniatura">
                    <?php endforeach ?>
                </div>
        </div>

    </main>

    <?php require_once 'includes/footer.php' ?>

</body>
</html>