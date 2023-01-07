<?php

$valor = 'Ruben';

//crear funcion para remplazar cada letra por su valor en ascii
function encrypt($valor){
    $valor = str_split($valor);
    $valor = array_map('ord', $valor);
    $valor = implode($valor);
    return $valor;
}

