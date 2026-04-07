<?php

$nome_cliente = "Eduardo";
$valor_em_debito = -0.27;
$valor_sem_sinal = abs($valor_em_debito);

$frase_devedora = "O prezado cliente que se recusa a pagar o que deve tem como nome $nome_cliente, e o valor em débito é de " . $valor_em_debito . "€.";

$frase_credora = "O honorável cliente " . $nome_cliente . " tem conosco um crédito de " . $valor_sem_sinal . ".";

$frase_regularizada = "O estimado cliente que nada deve ou teme, tem por seu nome " . $nome_cliente .".";

// operadores numéricos: + - / *
// operadores de comparação: < > <= >= != ==

/* if ($valor_em_debito > 0) {
    echo $frase_devedora;
} elseif ($valor_em_debito == 0) {
    echo $frase_regularizada;
} else {
    echo $frase_credora;
} */

$array_devedores = ['Andressa', 'Géssica', 'Dani', 'João', 'Eduardo', 'Vitor'];

/* for($i=0; $i< count($array_devedores); $i++) {
    echo $array_devedores[$i] . '<br>';
} */

foreach($array_devedores as $devedor) {
    echo "O bandido tem por nome " . $devedor . ". <br>";
} /* o foreach  faz a mesma coisa que o for, mas de forma mais facil, ele puxa a variável com a lista (devedores lá em cima), e puxa cada nome uma vez, sem precisar criar um loop indicando até que número ele deve rodar */

echo "<br><hr><br>";

function pre($dados, $morrer=false){
    echo "<br><pre>";
    echo var_dump($dados);
    echo "</pre>";
    if($morrer == true) {
        die();
    }
}

$andressa = [
    "nome"  => "Andressa",
    "idade" => 31,
    "morada" => "Faro",
];

$gessica = [
    "nome"  => "Géssica",
    "idade" => 25,
    "morada" => "Faro",
];

$dani = [
    "nome"  => "Dani",
    "idade" => 24,
    "morada" => "Faro",
];

$joao = [
    "nome"  => "João",
    "idade" => 18,
    "morada" => "Faro",
];

$eduardo = [
    "nome"  => "Eduardo",
    "idade" => 21,
    "morada" => "Olhão",
];

$vitor = [
    "nome"  => "Vitor",
    "idade" => 18,
    "morada" => "Olhão",
];

$devedores_02 = [$andressa, $gessica, $dani, $joao, $eduardo, $vitor];

pre($array_devedores);

pre($devedores_02);

echo "<br><hr><br>";

echo $andressa["morada"];

echo "<br><hr><br>";

foreach($devedores_02 as $devedor) {
    $nome = $devedor['nome'];
    $idade = $devedor['idade'];
    $morada = $devedor['morada'];
    echo "O bandido(a) " . $nome . " de " . $idade . "anos, ou paga o que deve ou terá uma dolorsa surpresa ao chegar à sua casa em " . $morada . ". <br><br>";
};

echo "<br><hr><br>";

echo "Estruturas Condicionais - IF <br><br>";

$rui = 67;
$ana = 65;

if ($rui == $ana) {
    echo "O Rui tem a mesma idade que a Ana.";
} elseif ($rui < $ana) {
    echo "O Rui é mais novo que a Ana.";
} else {
    echo "O Rui é mais velho que a Ana.";
}

echo "<br><hr><br>";

/* ou */

$rui_mais_velho = "O Rui é mais velho que a Ana.";
$rui_mesma_idade = "O Rui tem a mesma idade que a Ana.";
$rui_mais_novo = "O Rui é mais novo que a Ana.";

if ($rui == $ana) {
    echo $rui_mesma_idade;
} elseif ($rui < $ana) {
    echo $rui_mais_novo;
} else {
    echo $rui_mais_velho;
}

echo "<br><hr><br>";

/* ou */

$pessoa1 [
    "nome"  => "Rui",
    "idade" => 68,
];

$pessoa2 [
    "nome"  => "Ana",
    "idade" => 65,
];



?>