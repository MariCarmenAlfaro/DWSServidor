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
    <link rel="stylesheet" href="css/estilos_categorias.css">
</head>

<body>
    <h1>> > > > CATEGORÍAS DE NUESTRA CARTELERÍA < < < < </h1>
            <?php

   pintarCategorias(obtenerCategorias());
   function obtenerCategorias()
   {
       require('conexionBD.php');
    
   
       $consulta = "select * from T_CATEGORIA;";

       $resultado = mysqli_query($conexion, $consulta);

       if (!$resultado) {
           $mensaje = 'Consulta invalida: ' . mysqli_error($conexion) . "\n";
           $mensaje .= 'Consulta realizada: ' . $consulta;
           die($mensaje);
       } else {
           $arrayCategorias = [];
           if (($resultado->num_rows) > 0) {
               while ($registro = mysqli_fetch_assoc($resultado)) {

                   $generos = new Categorias(
                       $registro['id'],
                       $registro['imgTitulo'],
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
    
            echo "<li class='generos'> <a href='peliculas.php?genero=".$arrayCategorias[$i]->id."'><img src='../" . $arrayCategorias[$i]->imgTitulo . "'></a> </li>";
       }


       echo "</ul>";
       echo "</div>";
   }
   class Categorias
   {
       public $id;
       public $genero;
     

       function __construct($id, $genero)
       {
           $this->id = $id;
           $this->genero = $genero;

       }



       public function getId()
       {
           return $this->id;
       }
       public function setId($id)
       {
           return $this->id;
       }
       public function getGenero()
       {
           return $this->genero;
       }
       public function setGenero($genero)
       {
           return $this->genero;
       }
   }
   ?>


</body>