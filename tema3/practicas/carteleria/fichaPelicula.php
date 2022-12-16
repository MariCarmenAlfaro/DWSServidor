<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción película</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Sevillana&display=swap" rel="stylesheet">

    <?php
    //TODO llamar bd
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
            <?php

            echo "<a href='peliculas.php?genero=" . $_GET['genero'] ."' class=volverFicha >Volver</a>";



            echo "<form action= 'votos.php?' method='post'>
                    <input id='idPelicula' name='idPelicula' value=" . $_GET['id'] . " style='display:none'>
         	        <input class='botonVotar' type='submit' value='Votar película'>
                </form>";


            ?>

        </div>
        <div class="cuerpo">


            <?php

            contenidoPeli();
            function contenidoPeli()
            {
                require('conexionBD.php');

                $id_peli = $_GET['id'];
                if (empty($id_peli)) {
                    header('Location: controlErrores.php');
                }
                $sanitized_peli_id = mysqli_real_escape_string($conexion, $id_peli);
                $consulta = "select idReparto, nombreReparto, id_reparto, T_DIRECCION_PELICULA.id_peli, id, titulo, año, duracion, sinopsis,imagen, votos, id_categoria, id_direccion, T_REPARTO_PELICULA.id_peli,idDireccion, nombreDireccion from T_REPARTO left join T_REPARTO_PELICULA on id_reparto= idReparto left join T_PELICULA on id= id_peli 
                left join T_DIRECCION_PELICULA on id= id_direccion left join T_DIRECCION on id_direccion=idDireccion where T_DIRECCION_PELICULA.id_peli" . $sanitized_peli_id . ";";

                $resultado = mysqli_query($conexion, $consulta);

                if (!$resultado) {
                    $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                    $mensaje .= 'Consulta realizada: ' . $consulta;
                    die($mensaje);
                } else {
                    $arrayPeli = [];
                    $arrayReparto = [];


                    if (($resultado->num_rows) > 0) {
                        while ($registro = mysqli_fetch_assoc($resultado)) {

                            $peliReparto = new PeliculaReparto(
                                $registro['id'],
                                $registro['titulo'],
                                $registro['año'],
                                $registro['duracion'],
                                $registro['sinopsis'],
                                $registro['imagen'],
                                $registro['votos'],
                                $registro['id_categoria'],
                                $registro['id_peli'],
                                $registro['id_reparto'],
                                $registro['idReparto'],
                                $registro['nombreReparto'],
                                $registro['id_direccion'],
                                $registro['idDireccion'],
                                $registro['nombreDireccion']

                            );
                            $arrayPeli[] = $peliReparto;
                            $arrayReparto[] = $registro['nombreReparto'];
                        }

                        pintarPeli($peliReparto, $arrayReparto);
                    } else {
                        header('Location: controlErrores.php');
                    }
                }
            }

            function pintarPeli($peli, $arrayReparto)
            {
                echo "<div class='individuales'>";


                echo "<div class='tituloFicha'>" . $peli->titulo . "   </div>";

                echo "<div class='votosFicha'>Votos: " . $peli->votos . "</div> ";

                echo "<br/>";

                echo "<div ><img class='imagenFicha'  src=" . $peli->imagen . ">
                                      </div>";

                echo "<br/>";

                echo  "<div class='descripcionFicha'>" . $peli->sinopsis . "</div>";

                echo "<br/>";
                echo "<br/>";
                echo "Duración: <span class='infoExtraFicha'>&nbsp;" . $peli->duracion . " minutos.</span> ";
                echo "<br/>";

                echo  "<div class='director'>Director/a: <span class='infoExtraFicha'> &nbsp; " . $peli->nombreDireccion . "</span></div>";

                echo "<br/>";
                echo "Reparto: <span class='infoExtraFicha'>  &nbsp;  ";
                for ($i = 0; $i < count($arrayReparto); $i++) {

                    if (count($arrayReparto) == $i + 1) {
                        echo $arrayReparto[$i];
                    } else {
                        echo $arrayReparto[$i] . " - ";
                    }
                }
                echo "</span>";
                echo "<br/>";
                echo "</div>";
            }

            class PeliculaReparto
            {
                public $id;
                public $titulo;
                public $año;
                public $duracion;
                public $sinopsis;
                public $imagen;
                public $votos;
                public $idCategoria;
                public $id_reparto;
                public $id_peli;
                public $idReparto;
                public $nombreReparto;
                public $id_direcccion;
                public $idDireccion;
                public $nombreDireccion;
                function __construct(
                    $id,
                    $titulo,
                    $año,
                    $duracion,
                    $sinopsis,
                    $imagen,
                    $votos,
                    $idCategoria,
                    $id_reparto,
                    $id_peli,
                    $idReparto,
                    $nombreReparto,
                    $id_direcccion,
                    $idDireccion,
                    $nombreDireccion
                ) {
                    $this->id = $id;
                    $this->titulo = $titulo;
                    $this->año = $año;
                    $this->duracion = $duracion;
                    $this->sinopsis = $sinopsis;
                    $this->imagen = $imagen;
                    $this->votos = $votos;
                    $this->idCategoria = $idCategoria;
                    $this->id_reparto = $id_reparto;
                    $this->id_peli = $id_peli;
                    $this->idReparto = $idReparto;
                    $this->nombreReparto = $nombreReparto;
                    $this->id_direccion = $id_direcccion;
                    $this->idDireccion = $idDireccion;
                    $this->nombreDireccion = $nombreDireccion;
                }
            }
            ?>




        </div>

    </div>
</body>

</html>