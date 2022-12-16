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

require("categorias.php");
function test_categoria()
{ 
 

    obtenerCategorias();
 
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
echo "Test de las películas:<br>";
test("test_categoria");

?>
</body>
</html>