<?php

pintarPeli(contenidoPeli());

function contenidoPeli()
{
 require('conexionBD.php');
    $id_categoria =$_GET['genero'];
    $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
    $consulta = "SELECT * FROM T_PELICULA  where id_categoria='".$sanitized_categoria_id."';";
  //  $consulta = "SELECT * FROM T_Pelicula  ;";
  
   
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
        $mensaje .= 'Consulta realizada: ' . $consulta;
        die($mensaje);
    } else 
    {
       $arrayPeli=[];
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
           $arrayPeli[]=$peli;
            
                
            }
            
        
        } else {
            header('Location: controlErrores.php');
        }
        return $arrayPeli;
    }
    

    
}
function pintarPeli($peliculas)
    {
       for ($i=0; $i <count($peliculas) ; $i++) { 
        $peli=$peliculas[$i];
        echo "<div class='individuales'>";
 

        echo "<div class='titulo'>" . $peli->titulo . "   </div>";
      
        echo "<p class='votos'>Votos: ". $peli->votos."</p> ";
      
        echo "<br/>";
      
        echo "<div class='conjuntoImgSinopsis'>";
        echo "<div ><img class='imagen'  src=" . $peli->imagen . ">
                                            </div>";
      
        echo "<br/>";
      
        echo  "<div class='descripcion'>" . $peli->sinopsis . "</div>";
        echo "</div>";
        echo "<br/>";
        echo "<br/>";
        echo "Duración: ".$peli->duracion." minutos.";
      
       echo "<a href='fichaPelicula.php?id=". $peli->id ."&genero=".$peli->id_categoria."' class='fichaGrande'> Ver ficha</a> ";
      
        echo "</div>";
       }
 
    }
function obtenerPeliculasOrdenadas($tipoOrdenacion){
    require('conexionBD.php');
    $id_categoria =$_GET['genero'];
    $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
    if($tipoOrdenacion=='votos'){
    $consulta = "SELECT * FROM T_PELICULA  where id_categoria='".$sanitized_categoria_id."'order by votos;";}else{
        $consulta = "SELECT * FROM T_PELICULA  where id_categoria='".$sanitized_categoria_id."'order by titulo;";
    }
  //  $consulta = "SELECT * FROM T_Pelicula  ;";
  
   
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
        $mensaje .= 'Consulta realizada: ' . $consulta;
        die($mensaje);
    } else 
    {
       $arrayPeli=[];
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
           $arrayPeli[]=$peli;
            
                
            }
            
          
        } else {
            echo "No hay resultados";
        }
        return $arrayPeli;
    }
    
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
    public $id_categoria;
    function __construct($id, $titulo, $año, $duracion, $sinopsis, $imagen, $votos, $id_categoria)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->año = $año;
        $this->duracion = $duracion;
        $this->sinopsis = $sinopsis;
        $this->imagen = $imagen;
        $this->votos = $votos;
        $this->id_categoria = $id_categoria;
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
    public function getIdCategoria()
    {
        return $this->IdCategoria;
    }
    public function setIdCategoria($idCategoria)
    {
        return $this->idCategoria;
    }
}
