<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("cuadrado_magico.php");

function test_cuadrado_magico_1()
{ 
     $tablero = [
        [4,  9, 2],
        [3,  7, 7],
        [7,  1, 6],
        
    ];
    $cuadrado= new Cuadrado($tablero);
  return $cuadrado;
}
echo "Test de mi cuadrado mágico<br>";
test("test_cuadrado_magico_1");