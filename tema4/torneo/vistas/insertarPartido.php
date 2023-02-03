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
   $jugadorA=$_POST['JugadorA'];
    $jugadorB=$_POST['JugadorB'];
    $ronda=$_POST['ronda'];
    $ganador =$_POST['Ganador'];
    $idTorneo=$_GET['idTorneo'];
  $idPartido=$_GET['idPartido'];

    if(isset($_GET['type'])){
      $movimiento=$_GET['type'];
         switch ($movimiento) {
              case 'create':
     $partidosBL->crearPartido($jugadorA,$jugadorB, $ronda, $idTorneo);
     break;
     case 'edit':
      $partidosBL->modificarPartido($idPartido,$ganador);
      break;
              }
            } 
 
   header("Location:gestionTorneosVista.php?type=edit&idTorneo=".$idTorneo."");
  ?>
</body>
</html>