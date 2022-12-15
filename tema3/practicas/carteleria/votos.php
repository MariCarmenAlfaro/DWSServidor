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
<?php

require('conexionBD.php');


$id_peli = $_POST['idPelicula'];

$sanitized_peli_id = mysqli_real_escape_string($conexion, $id_peli);
$consulta = "update T_PELICULA set votos = votos+1 where id=". $sanitized_peli_id . ";";

//  $consulta = "SELECT * FROM T_Pelicula  ;";


$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    header('Location: controlErrores.php');

} else {
    
   
    echo "<h1 class='votoListoONo'>¡Se ha podido realizar el voto con éxito!</h1>";
   echo "<div class='contenedorLista listaCategorias'>";
    echo "<a href=categorias.php class=volverVotos >Volver a la página principal</a>";
    echo "</div>";
}

?>
</body>