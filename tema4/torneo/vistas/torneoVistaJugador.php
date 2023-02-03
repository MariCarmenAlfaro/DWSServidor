<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo</title>
    <link rel="stylesheet" href="../css/estiloFinal.css">
</head>
<body>
    <?php require("../Negocio/torneoReglasNegocio.php");
        ini_set("display_errors", "On");
        ini_set("html_errors", 0);
        $torneosBL = new TorneosReglasNegocio();
        $datosTorneos = $torneosBL->obtenerDatosListaTorneo();
         ?>


<h1> Listado de torneos para usuarios </h1>
<a href="logout.php" class="boton"> Cerrar sesión </a>
    <table class="listaTorneos"> 
        <tr class="headertabla">
            <td>ID</td>
            <td>Nombre del torneo</td>
            <td>Fecha</td>
            <td>Estado</td>
            <td>Número jugadores</td>
            <td>Campeón</td>
            
        </tr>
       
<?php
        
    
        foreach ($datosTorneos as $torneo) {
          
           
            echo "<tr class='listaTorneos' >";
         
            echo " <td>";
            print($torneo->getId());
            echo "</td> ";
           
            echo "<td>";
            print( "<a  href='jugadorVista.php?idTorneo=".$torneo->getId()."'> ".$torneo->getNombreTorneo());
        
            echo "</td>";

            echo "<td>";
            print($torneo->getFecha());
            echo "</td>";
            
            echo "<td>";
           
            echo "</td>";

            echo "<td>";
           print($torneo->getNumeroJugadores());
            echo "</td>";
         
            echo "<td>";
            echo "</td>";
            echo "</tr>";
  
        }

        ?>
</body>
</html>