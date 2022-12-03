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
                                    class Pelicula
                                    {
                                        public $titulo;
                                        public $descripcion;
                                        public $imagen;
                                        function __construct($titulo, $descripcion, $imagen)
                                        {
                                            $this->titulo = $titulo;
                                            $this->descripcion = $descripcion;
                                            $this->imagen = $imagen;
                                        }

                                        function pintarPeli()
                                        {

                                            echo "<div class='individuales'>";

                                            echo "<div class='tituloFicha'>" . $this->titulo . "   </div>";

                                            echo "<p class='votos'>Votos:</p> ";
                    
                                            echo "<br/>";

                                            echo "<div ><img class='imagenFicha'  src=" . $this->imagen . "></div>";

                                            echo "<br/>";
                    
                                            echo  "<div class='descripcion'>" . $this->descripcion . "</div>";
                    
                                          
                                            
                                            echo "</div>";
                                        }

                                        public function getTitulo()
                                        {
                                            return $this->titulo;
                                        }
                                        public function setTitulo($titulo)
                                        {
                                            return $this->titulo;
                                        }
                                        public function getImagen()
                                        {
                                            return $this->imagen;
                                        }
                                        public function setImagen($imagen)
                                        {
                                            return $this->titulo;
                                        }
                                        public function getDescripcion()
                                        {
                                            return $this->titulo;
                                        }
                                        public function setDescripcion($descripcion)
                                        {
                                            return $this->titulo;
                                        }
                                    }
                                    $peli = new Pelicula("Barbie en La princesa y la costurera", "La mítica muñeca Barbie cobra vida en esta moderna versión del cuento de Mark Twain \"El Príncipe y el Mendigo\" sobre un error de identidad y el poder de la amistad. Con la voz de Gisela como Barbie cantando siete temas originales llega la primera película musical de Barbie interpretando además un doble papel sobre un error de identidad y el poder de la amistad. Con la voz de Gisela como Barbie cantando siete temas originales llega la primera película musical de Barbie interpretando además un doble papel sobre un error de identidad y el poder de la amistad. Con la voz de Gisela como Barbie cantando siete temas originales llega la primera película musical de Barbie interpretando además un doble papel sobre un error de identidad y el poder de la amistad. Con la voz de Gisela como Barbie cantando siete temas originales llega la primera película musical de Barbie interpretando además un doble papel.", "imgs/img1.jpg");
                                    $peli->pintarPeli();
                                  
                                    ?>
           



        </div>
        <div class="piePagFicha"></div>
    </div>
</body>
</html>