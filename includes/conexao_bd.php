// conexão para cidades:::::::::

<?php 
$dsn                  = "mysql:host=$servername;dbname=dbname;charset=utf8mb4";
$opcoes               = [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_EMULATE_PREPARES => false
                        ];

try {
    $conexao = new PDO($dsn, $username, $password, $opcoes);
} catch (PDOException $e) {
    echo "a conexão falhou" . $e->getMessage();
}

// conexão para outro banco de dados: repte o código sem precisar repetir o $opcoes, mas altera as variãveis colocando, por exemplo, servername_nomedooutrodb e assim por diante... dessa forma não é preciso criar vários arquivos de conexão pra vários banco de dados, apenas criar arquivos para acesso

