
<?php


function pintarMatriz($matriz)
{
    for ($i = 0; $i < count($matriz); $i++) {
        for ($j = 0; $j < count($matriz); $j++) {
            print $matriz[$i][$j];
        }
        print "<br>";
    }
}

function obtenerIndiceFilaMejorPromedio($matriz)
{
    $filas = count($matriz);
    $promedio_max = PHP_INT_MIN;
    $fila_promedio_max = -1;

    for ($i = 0; $i < $filas; $i++) {
        $columnas = count($matriz[$i]);

        if ($filas == 0 || $columnas == 0) {
          throw new Exception('La matriz está vacía');
        }

        $suma_fila = array_sum($matriz);

        $promedio = $suma_fila / $columnas;
        if ($promedio > $promedio_max) {
            $promedio_max = $promedio;
            $fila_promedio_max = $i;
        }
    }



    return $fila_promedio_max;
}


$matriz = array();

pintarMatriz($matriz);


echo "la fila con el promedio maximo es " . obtenerIndiceFilaMejorPromedio($matriz);

