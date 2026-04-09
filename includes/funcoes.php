<?php

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

?>