<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Sevillana&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="estilos_terror.css">
</head>

<body>
    <div class="contenedor">
        <div class="barraNavegacion">
            <a href="peliculas.php" class="inicio">Volver</a>

        </div>
        <div class="cuerpo">


            <?php

            contenidoPeli();
            function contenidoPeli()
            {
                $conexion = mysqli_connect('localhost', 'root', '12345');

                if (mysqli_connect_errno()) {
                    echo "Error al conectar a MySQL" . mysqli_connect_error();
                }

                mysqli_select_db($conexion, 'carteleria');



                $id_categoria = $_GET['genero'];
                $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
                 $consulta = "SELECT * FROM T_Pelicula  where id_categoria=".$sanitized_categoria_id.";";
              
                //  $consulta = "SELECT * FROM T_Pelicula  ;";


                $resultado = mysqli_query($conexion, $consulta);

                if (!$resultado) {
                    $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                    $mensaje .= 'Consulta realizada: ' . $consulta;
                    die($mensaje);
                } else {
                    $arrayPeli = [];
                    $contador = 0;
                    if (($resultado->num_rows) > 0) {
                        while ($registro = mysqli_fetch_assoc($resultado)) {
                            $peli = new Pelicula(
                                $registro['id'],
                                $registro['titulo'],
                                $registro['año'],
                                $registro['duracion'],
                                $registro['sinopsis'],
                                $registro['imagen'],
                                $registro['votos'],
                                $registro['id_categoria']
                            );
                            $arrayPeli[] = $peli;
                            pintarPeli($peli);
                        }
                    } else {
                        echo "No hay resultados";
                    }
                }
            }

            ?>




        </div>
        <div class="piePagFicha"></div>
    </div>
</body>

</html>