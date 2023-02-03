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
        
 
          $torneosBL = new TorneosReglasNegocio();
          $datosTorneos=$torneosBL->obtenerDatosListaTorneo();
         
          $movimiento;
          if(isset($_GET['type'])){
            $movimiento=$_GET['type'];
          switch ($movimiento) {
            case 'create':
                echo "<div class='contenedorLogin'>";
    
                echo "<form action='../Vistas/insertarTorneo.php?' method='post'>";
          
                echo "<p class='datosLogin'>Nombre</p>";
        
                echo "<input type'text' name='nombreTorneo' id=''>";
                echo "<p class='datosLogin'>Fecha</p>";
        
                echo "<input type='date' name='fecha' id=''>";
                echo "<input type='submit' class='enviarBoton' value='Crear torneo'>";
                echo "</form>";
                echo "</div>";
                break;
            
            case 'edit':
                $partidosBL= new PartidosReglasNegocio();
                $idTorneoActual=$_GET['idTorneo'];
                
                
                $datosPartidos = $partidosBL->obtenerDatosListaPartido($idTorneoActual);
                
                echo "<div >";
                 echo "<a href='torneosVistaAdmin.php' class='boton'>Volver</a>";
                echo "<a href='../Vistas/resultadoPartidaVista.php?type=create&idTorneo=".$idTorneoActual."' class='boton'>Crear partido</a>";
               
                if(!empty($datosPartidos)){
            echo "<table class='listaTorneos'>";
              
            echo "<tr class='listaTorneos'>";
            echo "<td> ";
           echo "ID";
            echo "</td>";

            echo "<td> ";
            echo "Jugador A";
            echo "</td>";

            echo "<td>";
            echo "Jugador B";
            echo "</td>";
            
            echo "<td>";
            echo "Ronda";
            echo "</td>";

            echo "<td>";
           echo "Ganador";
            echo "</td>";
            
            echo "<td>";
            echo "<a href='gestionTorneosVista.php'></a>";
            echo "</td>";

            echo "<td>";
            echo "<a href=''></a>";
            echo "</td>";
            echo "</tr>";
                foreach ($datosPartidos as $partido) {
                   
                    echo "<tr class='listaTorneos'>";
                    echo "<td> ";
                    print($partido->getId());
                    echo "</td>";
        
                    echo "<td> Jugador ";
                    print($partido->getIdJugador1());
                    echo "</td>";
        
                    echo "<td> Jugador ";
                    print($partido->getIdJugador2());
                    echo "</td>";
                    
                    echo "<td>";
                    print($partido->getTipoPartido());
                    echo "</td>";
        
                    echo "<td>";
                    print($partido->getGanador());
                    echo "</td>";
                    
                    echo "<td>";
                    echo "<a href='resultadoPartidaVista.php?type=edit&idTorneo=".$idTorneoActual."&idPartido=".$partido->getId()."&idJugador1=".$partido->getIdJugador1()."&idJugador2=".$partido->getIdJugador2()."&tipoPartido=".$partido->getTipoPartido()."'>Editar</a>";
                    echo "</td>";
        
                    echo "<td>";
                     echo "<a href=''>Borrar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
             echo "</table>";
             
                echo "</div>";
            }else{
               echo "vaya parece que no hay partidos creados";
            }
                break;
            case 'delete':
                $idTorneoActual=$_GET['idTorneo'];
               echo "<div class='mensajeConfirmacion'>";
                echo "<a class='boton volver' href='http:../Vistas/torneosVistaAdmin.php'> Volver</a>";
               echo "<form action='../Vistas/eliminarTorneo.php?idTorneo=".$idTorneoActual."' method='post'>";
            
                echo "<h2>¿Desea eliminar el torneo?</h2>";
               echo "<input type='radio' name='confirmacion' value='si'>Sí";
               echo "<input type='radio' name='confirmacion' value='no'>No";
               
       
               echo "<input type='submit' class='enviarBoton' value='Enviar'>";
            
               echo "</form>";
               echo "</div>";
                 break;
          }
          
        }else{
            echo "Error! no tienes parametro";
        }
     
    ?>
</body>
</html>