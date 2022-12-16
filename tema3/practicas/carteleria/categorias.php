<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/estilos_categorias.css">
</head>

<body>
    <h1 class="titulo"><i class="bi bi-camera-reels-fill"></i> CATEGORÍAS DE NUESTRA CARTELERÍA <i class="bi bi-camera-reels-fill"></i></i></h1>
            <?php

            pintarCategorias(obtenerCategorias());
            function obtenerCategorias()
            {
                require('conexionBD.php');

                $consulta = "select id, genero,imgTitulo from T_CATEGORIA;";

                $resultado = mysqli_query($conexion, $consulta);

                if (!$resultado) {
                    header('Location: controlErrores.php');
                } else {
                    $arrayCategorias = [];
                    if (($resultado->num_rows) > 0) {
                        while ($registro = mysqli_fetch_assoc($resultado)) {

                            $generos = new Categorias(
                                $registro['id'],
                                $registro['genero'],
                                $registro['imgTitulo']
                            );
                            $arrayCategorias[] = $generos;
                        }
                    } else {
                        header('Location: controlErrores.php');
                    }
                    return $arrayCategorias;
                }
            }
            function pintarCategorias($arrayCategorias)
            {

                echo "<div class='contenedorLista'>";
                echo "<ul class='listaCategorias'>";
                for ($i = 0; $i < count($arrayCategorias); $i++) {

                    echo "<li class='generos'> <a href='peliculas.php?genero=" . $arrayCategorias[$i]->id . "&ordenacion=3' class='generos'>
            <div class='categorias'> <div class='nombreCat'>" . $arrayCategorias[$i]->genero . "</div>
            <img class='imgTitulo' src=" . $arrayCategorias[$i]->imgTitulo . "></div></></li>";
                }
                echo "</ul>";
                echo "</div>";
            }
            class Categorias
            {
                public $id;
                public $genero;
                public $imgTitulo;

                function __construct($id, $genero, $imgTitulo)
                {
                    $this->id = $id;
                    $this->genero = $genero;
                    $this->imgTitulo = $imgTitulo;
                }

            }
            ?>


</body>