<?php
// index.php
require_once 'config.php'; // Inclui o arquivo com as senhas
// Agora você pode usar a conexão $conn
// Seu código aqui...

/** exibe dados recebidos 
 * @param mixed $x - dados para análise
 * @param bool $x - 0 continua a execução de código, 1: morre aqui
 */

function pre($x, $die=0){
    echo "<pre>";
    var_dump($x);
    echo "</pre>";
    echo "<hr>";
    if ($die){
        die();
    }
}

$SQL = "SELECT * FROM cidades";
$stmt = $conexao -> prepare($SQL);
$stmt -> execute();
$resultado = $stmt -> fetchAll();

/* pre($resultado); só pra mostrar se deu certo */

?>

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
                <input type="submit" value="entrar" class="button">
            </form>

        </div>

    </header>

    <main>
        <div id="navbar_pesquisa">
            <form action="" name="form_pesquisa" method="GET" enctype="application/x-www-form-urlencoded">
                <input type="text" name="pesquisa">
                <input type="submit" value="pesquisar" class="button">
            </form>
        </div>

        <div id="paragrafo"><p id="p_01">Um homem precisa viajar. Por sua conta, não por meio de histórias, imagens, livros ou TV. Precisa viajar por si, com seus olhos e pés, para entender o que é seu. Para um dia plantar as suas próprias árvores e dar-lhes valor. Conhecer o frio para desfrutar o calor. E o oposto. Sentir a distância e o desabrigo para estar bem sob o próprio teto. Um homem precisa viajar para lugares que não conhece para quebrar essa arrogância que nos faz ver o mundo como o imaginamos, e não simplesmente como é ou pode ser. Que nos faz professores e doutores do que não vimos, quando deveríamos ser alunos, e simplesmente ir ver.</p>
    
        <p id="autor_p_01">Amyr Klink</p>

        </div>

        <p id="p_titulo_01">Cidades aderentes</p>

        <?php foreach($resultado as $cidade): ?>
        <div class="flex_box">
            <!-- pra cada box de cidade -->
            <div class="city_box">
                <p class="city_name"> <?php echo $cidade['nome_c'] ?> <p>
                <p class="city_text"> <?php echo $cidade['habitantes_c'] ?> </p>
                <p class="city_text"> <?php echo $cidade['pais_c'] ?> </p>
            </div>         
            <?php endforeach ?>
            <!-- o banco de dados vai buscar nome da cidade, habitantes e país -->                        
        </div>
    </main>

    <footer>
        O projeto Camalheia é exclusivamente patrocinado por Durex Lda, Harmony SA e Control Lda.
    </footer>

</body>
</html>