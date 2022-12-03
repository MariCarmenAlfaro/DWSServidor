<?php
/*$usuario = $_POST["usuario"];
$password =  $_POST["password"];
echo $usuario;
echo $password;*/


contenidoPeli();


function contenidoPeli()
{
    $conexion = mysqli_connect('localhost', 'root', '1234');

    if (mysqli_connect_errno()) {
        echo "Error al conectar a MySQL" . mysqli_connect_error();
    }

    mysqli_select_db($conexion, 'carteleria');
   
    
    
    $id_categoria =$_GET['genero'];
    $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);

    if ($_GET["genero"] === "2") {
        $consulta = "SELECT * FROM T_Pelicula  where id_categoria=2;";
    } elseif ($_GET["genero"] === "1") {
        $consulta = "SELECT * FROM T_Pelicula where id_categoria=1 ;";
    }
  //  $consulta = "SELECT * FROM T_Pelicula  ;";
  
   
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
        $mensaje .= 'Consulta realizada: ' . $consulta;
        die($mensaje);
    } else 
    {
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
function pintarPeli($peli)
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
  echo "<a href='fichaPelicula.php' class='fichaGrande'> Ver ficha</a> ";

  echo "</div>";
    }


class Pelicula
{
    public $id;
    public $titulo;
    public $año;
    public $duracion;
    public $sinopsis;
    public $imagen;
    public $votos;
    public $idCategoria;
    function __construct($id, $titulo, $año, $duracion, $sinopsis, $imagen, $votos, $idCategoria)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->año = $año;
        $this->duracion = $duracion;
        $this->sinopsis = $sinopsis;
        $this->imagen = $imagen;
        $this->votos = $votos;
        $this->idCategoria = $idCategoria;
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