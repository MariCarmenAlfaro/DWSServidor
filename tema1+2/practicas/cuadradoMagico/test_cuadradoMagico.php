<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESTS</title>
    <link rel="stylesheet" href="estilos_cuadrado_magico.css">
</head>
<body>
    

<?php
//ini_set('display_errors', 'On');
//ini_set('html_errors', 0);

require("cuadrado_magico.php");
function test_cuadrado_magico_1()
{ 
    $tablero = [
        [4,  9, 2],
        [3,  7, 7],
        [7,  1, 6],
        
    ];
   
    $cuadrado= new Cuadrado($tablero);
  return ($cuadrado->siEsmagico==true);
}


function test_cuadrado_magico_2()
{ 
     $tablero = [
        [4,  9, 2],
        [3,  5, 7],
        [8,  1, 6],
        
    ];
    $cuadrado= new Cuadrado($tablero);
    $cuadrado=analizarCuadradoMagico($tablero);
    if ($cuadrado->sumaFilas == true && $cuadrado->sumaColumnas == true &&
        $cuadrado->diagonal1 == true && $cuadrado->diagonal2 == true ) 
        {
            return ($cuadrado->siEsmagico==true);
        }
}


function test_cuadrado_magico_3()
{ 
     $tablero = [
        [4,  9, 2],
        [3,  7, 7],
        [7,  1, 1],
        
    ];
    $cuadrado= new Cuadrado($tablero);
    $cuadrado = analizarCuadradoMagico($tablero);
    if ($cuadrado->sumaFilas == false ||$cuadrado->sumaColumnas == false ||
    $cuadrado->diagonal1 == false || $cuadrado->diagonal2 == false ) 
    {
        return ($cuadrado->siEsmagico==false);
    }

}
function test_cuadrado_magico_4()
{ 
     $tablero = [
        [4,  9, 2,4],
        [3,  7, 7],
        [7,  1, 1],
        
    ];
    $cuadrado= new Cuadrado($tablero);
    $cuadrado = analizarCuadradoMagico($tablero);
        return ($cuadrado->siEsmagico==false);
    

}

function test_cuadrado_magico_5()
{ 
     $tablero = [
        [4,  9, 2,4],
        [3,  7, 7,2],
        [7,  1, 1,1],
        [7,  1, 1,1]
        
    ];
    $cuadrado= new Cuadrado($tablero);
    $cuadrado = analizarCuadradoMagico($tablero);
        return ($cuadrado->siEsmagico==false);
    

}
function test_cuadrado_magico_6()
{ 
     $tablero = [[4]];
        
    ;
    $cuadrado= new Cuadrado($tablero);
    $cuadrado = analizarCuadradoMagico($tablero);
        return ($cuadrado->siEsmagico==true);
    

}
function test($testEjecutar)
{
    try 
    {
        echo "<br>";
        $resultadoTest = $testEjecutar();
        $mensaje = 'El test: '.$testEjecutar.' ';
        $mensajeResultado = $resultadoTest ? 'OK' : 'KO';
        if($resultadoTest){
          echo "<span class='ok'>$mensaje $mensajeResultado</span>";  
        }else{
            echo "<span class='ko'>$mensaje $mensajeResultado</span>";  
        }
        

    }
    catch(Exception $e)
    {
        echo "<br>"."Se ha producido una excepción al ejecutar:".$testEjecutar."<br>";

    } 
}
echo "Test de mi cuadrado mágico:<br>";
test("test_cuadrado_magico_1");
test("test_cuadrado_magico_2");
test("test_cuadrado_magico_3");
test("test_cuadrado_magico_4");
test("test_cuadrado_magico_5");
test("test_cuadrado_magico_6");
?>
</body>
</html>