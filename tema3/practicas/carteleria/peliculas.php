<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Sevillana&display=swap" rel="stylesheet">

    <?php
    $estiloss = $_GET['estilo'];
    echo  "<link rel=stylesheet href=css/" . $estiloss . ">";
    /*
    if ($_GET["genero"] === "2") {
        echo  "<link rel=stylesheet href=css/estilos_terror.css>";
        echo "  <title>Terror</title>";
    } elseif ($_GET["genero"] === "1") {
        echo "<link rel=stylesheet href=css/estilos_barbie.css>";
        echo "  <title>Infantil</title>";
    } else {
        header('categorias.php');
    }*/
    ?>


</head>

<body>

    <div class="contenedor">
        <div class="barraNavegacion">
            <ul>
                <li class="listaNavegacion">
                    <a href="categorias.php" class="inicio">Inicio</a>
                    <?php
                    echo  "<a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=1' class='orden'>Votos ascendentes</a>";
                    echo  "<a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=2' class='orden'>Votos descendentes</a>";
                    echo  "<a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=3' class='orden'>Título ascendiente</a>";
                    echo  "<a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=4' class='orden'>Título descendiente</a>";


                    ?>
                </li>
            </ul>
        </div>
        <div class="cuerpo">

            <?php

            require('backPeli.php');
            /*
MIRAR ORDEN VOTOS Y TITULOS
*/
            ?>






        </div>
        <div class="piePag">CopyRight</div>
    </div>
</body>

</html>