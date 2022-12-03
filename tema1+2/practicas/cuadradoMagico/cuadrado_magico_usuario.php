<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadrado Mágico</title>
    <link rel="stylesheet" href="estilos_cuadrado_magico.css">
</head>

<body>
    <h1>CUADRADO MÁGICO</h1>

    <?php
    require('cuadrado_magico.php');
    $tablero = [
        [4,  9, 2],
        [3,  5, 7],
        [8,  1, 6],
        
    ];

    $cuadrado1 = new Cuadrado($tablero);
   
    $cuadrado1 = analizarCuadradoMagico($tablero) ;
    pintarCuadradoMagico($tablero,$cuadrado1);
    ?>

</body>

</html>