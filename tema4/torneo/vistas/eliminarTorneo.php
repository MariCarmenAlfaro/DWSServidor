<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="../css/estiloFinal.css">

</head>
<body>   
<div class="mensajeConfirmacion">
<?php    
require("../Negocio/torneoReglasNegocio.php");

    ini_set("display_errors", "On");
    ini_set("html_errors", 0);
    $torneosBL = new TorneosReglasNegocio(); 
    $id = $_GET['id'];
    $nombreTorneo=$_GET['name'];
   $torneosBL->eliminarTorneo($id);
    echo  "<h1 class='titulo'>Has eliminado el torneo ".$nombreTorneo."</h1>"; 

  
  ?>
  <a class="boton" href="http:../Vistas/torneosVistaAdmin.php"> Volver</a></div>
</body>
</html>