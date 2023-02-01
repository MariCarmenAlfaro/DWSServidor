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
    $torneosBL = new TorneosReglasNegocio();

   $partidosBL = new PartidosReglasNegocio();

   //TODO obtener el id del torneo actual con $datosTorneos->getId() o algo asi dice mari que le ha dicho el profesor
   $nombreTorneo=$_POST['nombreTorneo'];
    $fechaTorneo =$_POST['fecha'];
    $datosTorneos = $torneosBL->insertarNuevosTorneos($nombreTorneo,$fechaTorneo);
    $idTorneo = $torneosBL->obtenerIdUtlimoTorneo();
   $datosPartidos = $partidosBL->insertarPartidosNuevosTorneo($idTorneo);
   
   
   //header("Location:torneosVistaAdmin.php");
  ?>
</body>
</html>