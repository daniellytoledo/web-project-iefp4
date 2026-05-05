<?php
require_once 'config.php'; // Inclui o arquivo com as senhas
require_once 'includes/funcoes.php'; // funções

// se eu quiser apenas puxar um arquivo com a senha do banco de dados, eu posso criar uma pasta fora do projeto e dentro do servidor com o acesso aos bancos de dados em vários arquivos, e aqui no index apenas puxar esse arquivo com a senha de acesso, sem precisar colocar a senha aqui no código... fazer um require_once e colocar o caminho do arquivo que neste caso seria "../../credenciais_db/cidades_acesso.php além de adicionar um require_once também com a conexão_db

$SQL = "SELECT * FROM cidades";
$stmt = $conexao -> prepare($SQL);
$stmt -> execute();
$resultado = $stmt -> fetchAll();

?>

<!DOCTYPE html>
<html lang="pt">
<?php require_once 'includes/head.php' ?>

<body>
    <?php require_once 'includes/header.php' ?>

    <main>

        <?php require_once 'includes/pesquisa_home.php' ?>

        <div id="paragrafo"><p id="p_01">Um homem precisa viajar. Por sua conta, não por meio de histórias, imagens, livros ou TV. Precisa viajar por si, com seus olhos e pés, para entender o que é seu. Para um dia plantar as suas próprias árvores e dar-lhes valor. Conhecer o frio para desfrutar o calor. E o oposto. Sentir a distância e o desabrigo para estar bem sob o próprio teto. Um homem precisa viajar para lugares que não conhece para quebrar essa arrogância que nos faz ver o mundo como o imaginamos, e não simplesmente como é ou pode ser. Que nos faz professores e doutores do que não vimos, quando deveríamos ser alunos, e simplesmente ir ver.</p>
    
        <p id="autor_p_01">Amyr Klink</p>

        </div>

        <p id="p_titulo_01">Cidades aderentes</p>

        <div class="flex_box">
            <?php foreach($resultado as $cidade): ?>
            <!-- pra cada box de cidade -->

            <a href="detalhes.php?cidade=<?php echo $cidade['id_c']?>">
            <div class="city_box">
                <p class="city_name"> <?php echo $cidade['nome_c'] ?> <p>
                <p class="city_text"> Nº de Habitantes: <?php echo $cidade['habitantes_c'] ?> </p>
                <p class="city_text"> <?php echo $cidade['pais_c'] ?> </p>
            </a>         

            </div>
            <?php endforeach ?>
            <!-- o banco de dados vai buscar nome da cidade, habitantes e país -->                        
        </div>
    </main>

    <?php require_once 'includes/footer.php' ?>

</body>
</html>