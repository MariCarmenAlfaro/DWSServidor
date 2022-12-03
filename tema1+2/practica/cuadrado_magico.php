<?php
class Cuadrado
{
    public $tablero;
    public $siEsmagico =true;
    public $filaLider=0;
    public $sumaFilas = true;
    public $filaIncorrecta;
    public $sumaColumnas = true;
    public $columnaIncorrecta;
    public $diagonal1 = true;
    public $diagonal2 = true;

    function __construct($tablero)
    {

    }
}
function analizarCuadradoMagico($tablero)
{
    $cuadradoFinal = new Cuadrado($tablero);
    
    $arrayFilas =  sumarFilas($tablero);
    $cuadradoFinal->filaIncorrecta = [];
   
    for ($i = 0; $i < count($tablero); $i++) 
    {
        $cuadradoFinal->filaLider=$arrayFilas[0];
        if ($arrayFilas[$i] !=  $cuadradoFinal->filaLider) 
        {
            $cuadradoFinal->sumaFilas = false;
            array_push($cuadradoFinal->filaIncorrecta, ($i+1));
        }
    }
   
    $arrayColumnas = sumarColumnas($tablero);
    $cuadradoFinal->columnaIncorrecta = [];
  
    for ($i = 0; $i < count($tablero); $i++)
     {
        if ($arrayColumnas[$i] !=  $cuadradoFinal->filaLider) 
        {
            $cuadradoFinal->sumaColumnas = false;
            array_push($cuadradoFinal->columnaIncorrecta, ($i+1));
          
        }
    }
   
    $diagonal1 = sumarDiagonalPrimera($tablero);
    if ($diagonal1 !=  $cuadradoFinal->filaLider)
    {
        $cuadradoFinal->diagonal1 = false;
       
    }

    $diagonal2 = sumarDiagonalSegunda($tablero);
    if ($diagonal2 !=  $cuadradoFinal->filaLider) 
    {
        $cuadradoFinal->diagonal2 = false;
      
    }
 
    if ($cuadradoFinal->sumaFilas == true && $cuadradoFinal->sumaColumnas == true &&
        $cuadradoFinal->diagonal1 == true && $cuadradoFinal->diagonal2 == true ) 
    {
        $cuadradoFinal->siEsmagico = true;
       
    } else 
    {
        $cuadradoFinal->siEsmagico = false;
        
    }

    return $cuadradoFinal;
}

function pintarCuadradoMagico($tablero, $cuadradoFinal)
{
    echo '<table>';
    for ($filas = 0; $filas < count($tablero); $filas++) 
    {
        echo '<tr>';
        for ($columnas = 0; $columnas < count($tablero[$filas]); $columnas++) 
        {
            echo '<td>' . $tablero[$filas][$columnas] . '</td>';
        }
        echo '</tr>';
    }
    echo '<table>';
   
   
   if($cuadradoFinal->siEsmagico)
   {
    echo "<p class='esMagico'>SI ES UN CUADRADO MÁGICO</p>";
   }
   else
   {
    echo "<p class='noEsMagico'>NO ES UN CUADRADO MÁGICO</p>";
   
    echo "<p>Respecto a la suma de la primera fila que es ".$cuadradoFinal->filaLider."<p>";

    if($cuadradoFinal->sumaFilas==false)
    {
        echo "Las filas incorrectas son: "."<br/><br/>";

        for ($i=0; $i <count($cuadradoFinal->filaIncorrecta) ; $i++) 
        { 
            echo "Fila ". $cuadradoFinal->filaIncorrecta[$i]."<br/><br/>";
        }  
    } 
   
    if($cuadradoFinal->sumaColumnas==false)
    {
        echo "Las columnas incorrectas son: "."<br/><br/>";

        for ($i=0; $i <count($cuadradoFinal->columnaIncorrecta) ; $i++) 
        { 
            echo "Columna ". $cuadradoFinal->columnaIncorrecta[$i]."<br/><br/>";
        }  
    }
    
    if($cuadradoFinal->diagonal1==false||$cuadradoFinal->diagonal2==false)
    {
        echo "Las diagonales diferentes son: "."<br/><br/>";

        if($cuadradoFinal->diagonal1==false)
        {
            echo "Primera diagonal"."<br/>";
        }

        if($cuadradoFinal->diagonal2==false)
        {
            echo "Segunda diagonal";
        }
    }
   }
}

function sumarFilas($tablero)
{
    $filas = [];
    for ($fila = 0; $fila < count($tablero); $fila++) 
    {
        $suma = 0;
        for ($columna = 0; $columna < count($tablero[$fila]); $columna++) 
        {
            $suma = $suma + $tablero[$fila][$columna] . "\n";
        }
        $filas[$fila] = $suma;
    }

    return $filas;
}


function sumarColumnas($tablero)
{
    $columnas = [];
    for ($columna = 0; $columna < count($tablero); $columna++) 
    {
        $suma = 0;
        for ($fila = 0; $fila < count($tablero[$columna]); $fila++) 
        {
            $suma = $suma + $tablero[$fila][$columna];
        }
        $columnas[$columna] = $suma;
    }

    return $columnas;
}

function sumarDiagonalPrimera($tablero)
{
    $suma = 0;
    $contador = (count($tablero) - 1);
    for ($fila = 0; $fila < count($tablero); $fila++) 
    {
        $suma = $suma + $tablero[$contador][$fila] . "\n";
        $contador--;
    }

    return $suma;
}

function sumarDiagonalSegunda($tablero)
{
    $suma = 0;

    for ($fila = 0; $fila < count($tablero); $fila++) 
    {
        $suma = $suma + $tablero[$fila][$fila] . "\n";
    }
    return $suma;
}