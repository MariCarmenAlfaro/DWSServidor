<?php
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
    }
    function pintarPeli()
    {

        echo "<div class='individuales'>";

        echo "<div class='titulo'>" . $this->titulo . "   </div>";

        echo "<p class='votos'>Votos:". $this->votos."</p> ";

        echo "<br/>";

        echo "<div ><img class='imagen'  src=" . $this->imagen . ">
                                            </div>";

        echo "<br/>";

        echo  "<div class='descripcion'>" . $this->sinopsis . "</div>";

        echo "<br/>";
        echo "<br/>";
        echo "Duración: ".$this->duracion;
        echo "<a href='fichaPelicula.php' class='fichaGrande'> Ver ficha</a> ";

        echo "</div>";
    }
   function contenidoPeli()
    {
        $conexion = mysqli_connect('localhost', 'root', '12345');

        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL" . mysqli_connect_error();
        }

        mysqli_select_db($conexion, 'carteleria');
        $id_categoria = $_POST['id_categoria'];
        $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);

        $consulta = "SELECT * FROM T_Pelicula ;";
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
                    $arrayPeli[$contador] = $peli;
                    $contador++;
                }
                print_r($arrayPeli);
                echo "hola";
            } else {
                echo "No hay resultados";
            }
        }
        return $arrayPeli;
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
