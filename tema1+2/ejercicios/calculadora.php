
<?php

use LDAP\Result;


class Calculadora
{
    public $numeroA;
    public $numeroB;

    public function __construct()
    {
    }
    public function calculoFactorial($numeroA)
    {
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);
        $result = 0;
        try {

            if ($numeroA == 0) {
                return 1;
            } elseif ($numeroA > 0) {
                $result = 1;
                while ($numeroA > 0) {
                    $result = $result * $numeroA;
                    $numeroA = $numeroA - 1;
                }
                return $result;
            } else {
                return 'Debe ser mayor que 0';
            }
        } catch (ValueError $e) {
            echo "ERROR: " . $e;
        }
    }


    public function coeficienteBinomial($n, $k)
    {
        $resultado = 0;
        if (($n - $k) < 0) {
            return $resultado;
        } else {
            $resultado = $this->calculoFactorial($n) / $this->calculoFactorial($k) * $this->calculoFactorial($n - $k);
        }
        return $resultado;
    }

    public function convierteBinarioDecimal($cadenaBits)
    {
        $longuitud = strlen($cadenaBits);
        $cadenaInversa = strrev($cadenaBits);
        $resultadoDecimal = 0;
        for ($i = 0; $i < $longuitud; $i++) {
            $resultado =  (2 ** $i) * $cadenaInversa[$i] + $resultadoDecimal;
        }
        return $resultadoDecimal;
    }

    public function sumaNumerosPares($array)
    {
        $suma = 0;
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] % 2 == 0) {
                $suma = $suma + $array[$i];
            }
        }
        return $suma;
    }

    public function siCapcua($cadena)
    {
        var_dump($cadena);
        $cadenaInvertida = strrev($cadena);

        if ($cadena == $cadenaInvertida) {
            return true;
        } else {
            return "0";
        }
    }
    public function sumaMatrices($primera_matriz, $segunda_matriz)
    {
    
        $suma = $primera_matriz;
 
            for ($i = 0; $i < count($primera_matriz); $i++) {
                    for ($j = 0; $j < count($primera_matriz[$i]); $j++) {
                        $suma[$i][$j] = $primera_matriz[$i][$j] + $segunda_matriz[$i][$j];
                    }
                }
            
        
        return $suma;
        }
}
