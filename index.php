<?php
/*
$nombre = 'Angel';
$apellido = 'Villegas';
$edad = 7;
$genero = 'Hombre';

function saludar($a, $b, $c, $d) {
    echo 'Hola ' . $a . ' ' . $b . ', tienes ' . $c . ' años y eres ' . $d;
}

saludar($nombre, $apellido, $edad, $genero);



//integros
$numero_integro = 10;
//flotante
$numero_flotante = 10.5;
//cadena
$nombre = 'Angel ';

//$numero_integro = (int) $nombre;

function sumar($a, $b){
    $total = $a+$b;
    return $total;
}

echo $numero_integro;
*/

//arreglos


$colores = array('rojo', 'verde', 'azul', 'amarillo', 'cafe', 'rosa','morado');
//echo $colores[1];

$color = array(
    'nombre' => 'rojo',
    'hexadecimal' => '#FF0000',
    'rgb' => '255, 0, 0'
);

$count = count($colores);
for($i=0; $i<=$count-1; $i++){
    //echo $colores[$i].'<br>';
}

foreach($colores as $color){
    //echo $color.'<br>';
}

var_dump


?>