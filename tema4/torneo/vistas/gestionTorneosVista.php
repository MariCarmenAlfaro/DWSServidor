<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear torneo</title>
    <link rel="stylesheet" href="../css/estiloFinal.css">

</head>
<body>
      <?php
          require("../Negocio/torneoReglasNegocio.php");
          require("../Negocio/partidosReglasNegocio.php");
          ini_set("display_errors", "On");
          ini_set("html_errors", 0);
          $torneosBL = new TorneosReglasNegocio();
          $datosTorneos=$torneosBL->obtenerDatosListaTorneo();

          $partidosBL= new PartidosReglasNegocio();
          $datosPartidos = $partidosBL->obtenerDatosListaPartido();
        
          $movimiento;
          if(isset($_GET['type'])){
            $movimiento=$_GET['type'];
          switch ($movimiento) {
            case 'create':
                echo "<div class='contenedorLogin'>";
    
                echo "<form action='../Vistas/insertarTorneo.php' method='post'>";
          
                echo "<p class='datosLogin'>Nombre</p>";
        
                echo "<input type'text' name='nombreTorneo' id=''>";
                echo "<p class='datosLogin'>Fecha</p>";
        
                echo "<input type='date' name='fecha' id=''>";
                echo "<input type='submit' value='Crear torneo'>";
                echo "</form>";
                echo "</div>";
                break;
            
            case 'edit':
                echo "<div >";
     
                echo "<a href='../Vistas/resultadoPartidaVista.php'>Crear partido</a>";
             
                foreach ($datosPartidos as $partido) {
                   //  print_r($partido); 
                    echo "<tr class='listaTorneos'>";
                    echo "<td>";
                    print($partido->getId());
                    echo "</td>";
        
                    echo "<td>";
                    print($partido->getJugador1());
                    echo "</td>";
        
                    echo "<td>";
                    print($partido->getJugador2());
                    echo "</td>";
                    
                    echo "<td>";
                    
                    echo "</td>";
        
                    echo "<td>";
                  
                    echo "</td>";
                    
                    echo "<td>";
                    echo "<a href='gestionTorneosVista.php?type=edit&id=".$partido->getId()."'>Editar</a>";
                    echo "</td>";
        
                    echo "<td>";
                     echo "<a href='gestionTorneosVista.php?type=delete&id=".$partido->getId()."&name='>Borrar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
        
                echo "</div>";
                break;
            case 'delete':
               echo "<div class='mensajeConfirmacion'>";
            
                    $id = $_GET['id'];
                    $nombreTorneo=$_GET['name'];
                   $torneosBL->eliminarTorneo($id);
                    echo "<h1 class='titulo'>Has eliminado el torneo ".$nombreTorneo."</h1>"; 
                     echo "<a class='boton' href='http:../Vistas/torneosVistaAdmin.php'> Volver</a></div>";
                 break;
          }
          
        }else{
            echo "error no tienes parametro";
        }
     


    ?>
</body>
</html>