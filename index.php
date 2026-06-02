<?php
session_start();

require_once 'config.php'; // Inclui o arquivo com as senhas
require_once 'includes/funcoes.php'; // funções

// se eu quiser apenas puxar um arquivo com a senha do banco de dados, eu posso criar uma pasta fora do projeto e dentro do servidor com o acesso aos bancos de dados em vários arquivos, e aqui no index apenas puxar esse arquivo com a senha de acesso, sem precisar colocar a senha aqui no código... fazer um require_once e colocar o caminho do arquivo que neste caso seria "../../credenciais_db/cidades_acesso.php além de adicionar um require_once também com a conexão_db

$SQL = "SELECT * FROM cidades";
$stmt = $conexao->prepare($SQL);
$stmt->execute();
$resultado = $stmt->fetchAll();

// verificar se o usuário existe ao fazer login
if(isset($_POST['fuser'])) {
    $sql       = "SELECT * FROM utilizadores WHERE nome_f =?";
    $stmt      = $conexao->prepare($sql); // prepara os dados conferindo se o que recebeu é o mesmo tipo de dados que está na tabela para ter certeza que não há injeções no SQL 
    $stmt->execute([$_POST['fuser']]);
    $resposta = $stmt->fetch();

    // verificar se o array do resultado tem dados, se tem dados é porque o usuário existe na tabela de dados, se não tem, ele volta como count 0, então...
    if(count($resultado)>0) {

        // verificar se a senha recebida pelo post é SIMILAR a senha do $passEcriptada porque iguais nunca vão ser por conta do timestemp
        if(password_verify($_POST['fpass'], $resposta['pass_u'])) {

            // para a página continuar verificando o utilizador e suas permissões
            $_SESSION['utilizador_nome']  = $resposta['nome_u'];
            $_SESSION['utilizador_nivel'] = $resposta['nivel_u'];
            $_SESSION['utilizador_id']    = $resposta['id_u'];
        } else {
            $_SESSION['alerta'] = "A password está incorreta!";
        }
    } else {
        $_SESSION['alerta'] = "Utilizador não encontrado!";
    }
}

// se o array de SESSION tem um elemento alerta
if(isset($_SESSION['alerta'])){
    // cria variável com o texto do alerta
    $alerta = $_SESSION['alerta'];
    // remove o alerta de SESSION
    unset($_SESSION['alerta']);
    // exibe a janela alerta
    $styleJanelaAlerta = "display:block;";
}else{
    // mantém escondida a janela alerta
    $styleJanelaAlerta = "display:none;";
}

?>

<!DOCTYPE html>
<html lang="pt">
<?php require_once 'includes/head.php' ?>

<body>
    <?php require_once 'includes/header.php' ?>

    <main>

        <?php require_once 'includes/pesquisa_home.php' ?>

        <div id="paragrafo">
            <p id="p_01">Um homem precisa viajar. Por sua conta, não por meio de histórias, imagens, livros ou TV. Precisa viajar por si, com seus olhos e pés, para entender o que é seu. Para um dia plantar as suas próprias árvores e dar-lhes valor. Conhecer o frio para desfrutar o calor. E o oposto. Sentir a distância e o desabrigo para estar bem sob o próprio teto. Um homem precisa viajar para lugares que não conhece para quebrar essa arrogância que nos faz ver o mundo como o imaginamos, e não simplesmente como é ou pode ser. Que nos faz professores e doutores do que não vimos, quando deveríamos ser alunos, e simplesmente ir ver.</p>

            <p id="autor_p_01">Amyr Klink</p>

        </div>

        <p id="p_titulo_01">Cidades aderentes</p>

        <div class="flex_box">
            <?php foreach ($resultado as $cidade): ?>
                <!-- pra cada box de cidade -->

                <a href="detalhes.php?cidade=<?php echo $cidade['id_c'] ?>">
                    <div class="city_box">
                        <p class="city_name"> <?php echo $cidade['nome_c'] ?>
                        <p>
                        <p class="city_text"> Nº de Habitantes: <?php echo $cidade['habitantes_c'] ?> </p>
                        <p class="city_text"> <?php echo $cidade['pais_c'] ?> </p>
                </a>

        </div>
    <?php endforeach ?>
    <!-- o banco de dados vai buscar nome da cidade, habitantes e país -->
    </div>
    </main>

    <?php require_once 'includes/footer.php' ?>

    <div id="janelaAlertas_id" style="<?= $styleJanelaAlerta ?>">
        <div id="alerta_id">
            <div id="titulo_aviso">Informação:</div>
            <p id="textoAviso_id"><?= $alerta ?></p>
            <br>
            <div class='grupo-bts'>
                <a href="#" onclick="removerJanelaAlerta()" class="bts-aviso">OK</a>
            </div>
        </div>
    </div>

</body>

</html>