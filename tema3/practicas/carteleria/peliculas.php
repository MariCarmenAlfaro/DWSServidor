<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelicula</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Sevillana&display=swap" rel="stylesheet">

    <?php
    if ($_GET["genero"] === "2") {
        echo  "<link rel=stylesheet href=estilos_terror.css>";
    } elseif ($_GET["genero"] === "1") {
        echo "<link rel=stylesheet href=estilos_barbie.css>";
    }else{
        header('categorias.php');
    }
    ?>


</head>

<body>
    <div class="contenedor">
        <div class="barraNavegacion">
            <ul>
                <li class="listaNavegacion">
                    <a href="categorias.php" class="inicio">Inicio</a>
                </li>
                <li class="listaNavegacion">
                    <a href="categorias.php" class="inicio">Ordenar por votos</a>
                </li>
                <li class="listaNavegacion">
                    <a href="categorias.php" class="inicio">Ordenar por título</a>
                </li>
            </ul>
        </div>
        <div class="cuerpo">

            <?php

            require('backPeli.php');
/*
PONER ESTILOS Y CAMBIOS EN CSS BARBIE
MIRAR ORDEN VOTOS Y TITULOS
PPNER SI HAY ERROR QUE SALGA PAGINA DE ERROR
*/ 
            ?>






        </div>
        <div class="piePag">CopyRight</div>
    </div>
</body>

</html>