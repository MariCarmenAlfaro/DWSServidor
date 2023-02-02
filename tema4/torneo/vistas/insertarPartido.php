<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertado</title>

</head>
<body>    
<?php    
require("../Negocio/torneoReglasNegocio.php");
require("../Negocio/partidosReglasNegocio.php");


    ini_set("display_errors", "On");
    ini_set("html_errors", 0);
  
    $partidosBL = new PartidosReglasNegocio();

   //TODO obtener el id del torneo actual con $datosTorneos->getId() o algo asi dice mari que le ha dicho el profesor
    $jugadorA=$_POST['JugadorA'];
    $jugadorB=$_POST['JugadorB'];
    $ronda=$_POST['ronda'];
    $ganador =$_POST['Ganador'];
    $idTorneo=$_GET['id'];
   
    $partidosBL->crearPartidoConganador($jugadorA,$jugadorB, $ronda, $idTorneo, $ganador);
   
  // header("Location:torneosVistaAdmin.php");
  ?>
</body>
</html>