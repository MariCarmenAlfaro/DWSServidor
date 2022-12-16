<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Sevillana&display=swap" rel="stylesheet">
    <title>Peliculas</title>
    <?php
    require('conexionBD.php');

    $id_categoria = $_GET['genero'];
    if (empty($id_categoria)) {
        header('Location: controlErrores.php');
    }
    $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);

    $consulta = "SELECT estilo FROM T_CATEGORIA  where id=" . $sanitized_categoria_id . ";";

    $resultado = mysqli_query($conexion, $consulta);
    $estilos;
    if (!$resultado) {
        header('Location: controlErrores.php');
    } else {

        if (($resultado->num_rows) > 0) {
            while ($registro = mysqli_fetch_assoc($resultado)) {
                $estilos = $registro['estilo'];
            }
        } else {
            header('Location: controlErrores.php');
        }
    }
    echo "<link rel=stylesheet href=css/" . $estilos . ">";
    ?>


</head>

<body>

    <div class="contenedor">
        <div class="barraNavegacion">
            <ul>
                <li class="listaNavegacion">

                    <a href="categorias.php" class="inicio">Inicio</a>

                </li>
            </ul>
            <ul>

        </div>
        <?php
        echo "<div class='filtros'>";
        echo "<h2>Filtros</h2>";
        echo  " <li><a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=1' class='orden'>Votos ascendentes</a></li>";
        echo  " <li><a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=2' class='orden'>Votos descendentes</a></li>";
        echo  " <li><a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=3' class='orden'>Título ascendiente</a></li>";
        echo  " <li><a href='peliculas.php?genero=" . $_GET['genero'] . "&ordenacion=4' class='orden'>Título descendiente</a></li>";

        echo "</div>";
        ?>


        <div class="cuerpo">

            <?php

            require('backPeli.php');

            ?>

        </div>
        <div class="piePag">CopyRight</div>
    </div>
</body>

</html>