<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha</title>
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
         <?php
        
           echo "<a href=peliculas.php?genero=".$_GET['genero']." class=volverFicha >Volver</a>";

           echo "<a href=votos.php >Votar pelicula</a>";

         echo "<form action= 'votos.php?' method='post'>
        <input id='idPelicula' name='idPelicula' value=
           ".$_GET['id']." style='display:none'>
         	<input type='submit' value='Votar'>
        </form>";
           

  ?>
           
        </div>
        <div class="cuerpo">


            <?php

            contenidoPeli();
            function contenidoPeli()
            {
                $conexion = mysqli_connect('localhost', 'root', '1234');

                if (mysqli_connect_errno()) {
                    echo "Error al conectar a MySQL" . mysqli_connect_error();
                }

                mysqli_select_db($conexion, 'carteleria');



                $id_peli = $_GET['id'];
                
                $sanitized_peli_id = mysqli_real_escape_string($conexion, $id_peli);
                 $consulta = "SELECT * FROM T_PELICULA inner join T_REPARTO_PELICULA on id=id_peli inner join T_REPARTO on id_reparto=idReparto where id=".$sanitized_peli_id.";";
            echo $consulta;
                //  $consulta = "SELECT * FROM T_Pelicula  ;";


                $resultado = mysqli_query($conexion, $consulta);

                if (!$resultado) {
                    $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
                    $mensaje .= 'Consulta realizada: ' . $consulta;
                    die($mensaje);
                } else {
                    $arrayPeli = [];
                    $arrayReparto=[];
                    $contador = 0;
                 
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
                                $registro['nombreReparto']
                            );
                            $arrayPeli[] = $peliReparto; 
                            $arrayReparto[]=$registro['nombreReparto'];
                            
                        }
                        print_r($arrayReparto);
                        pintarPeli($peliReparto, $arrayReparto);
                    } else {
                        echo "No hay resultados";
                       
                    }
                }
            }
          
            function pintarPeli($peli,$arrayReparto)
    {
  echo "<div class='individuales'>";
 

  echo "<div class='titulo'>" . $peli->titulo . "   </div>";

  echo "<p class='votos'>Votos: ". $peli->votos."</p> ";

  echo "<br/>";

  echo "<div ><img class='imagen'  src=" . $peli->imagen . ">
                                      </div>";

  echo "<br/>";

  echo  "<div class='descripcion'>" . $peli->sinopsis . "</div>";

  echo "<br/>";
  echo "<br/>";
  echo "Duración: ".$peli->duracion." minutos.";

echo "Reparto: ";
for ($i=0; $i <count($arrayReparto) ; $i++) { 
   echo $arrayReparto[$i];
}

  

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
                function __construct($id, $titulo, $año, $duracion, $sinopsis, $imagen, $votos, $idCategoria, $id_reparto,$id_peli,$idReparto,$nombreReparto)
                {
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
                   
                    //contenidoPeli();
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
                    return $this->descripcion;
                }
                public function setDescripcion($descripcion)
                {
                    return $this->descripcion;
                }
            }
            ?>




        </div>
        <div class="piePagFicha"></div>
    </div>
</body>

</html>