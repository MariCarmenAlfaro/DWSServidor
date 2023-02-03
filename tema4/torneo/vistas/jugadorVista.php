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
    <h1>Torneo tenis mesa</h1>
    <h2>Temporada 2023</h2>
    <?php
    require("../Negocio/jugadoresReglasNegocio.php");
   require_once("../Negocio/partidosReglasNegocio.php");
   $jugadores = new JugadoresReglasNegocio();
   $partidos = new PartidosReglasNegocio();
   $id=$_GET['idTorneo'];
   $datosTorneos = $jugadores->obtenerDatosJugadores();
   $partidos->obtenerDatosListaPartido($id);
    echo "<div class='tabla'>"; 

        echo "<div class='columnas'>";
        echo " <h3>Cuartos</h3>";
            foreach($datosTorneos as $jugador){
               var_dump($jugador->getId());
                echo "<div class='cuartos'>";
                echo" <a href='jugadorVistaFicha.php?id=".$jugador->getId()."'> <div class='jugadorCuarto'>".  $jugador->getIdJugador1()."</div></a>";
                echo" <a href='jugadorVistaFicha.php?id=".$jugador->getId()."'> <div class='jugadorCuarto'>".  $jugador->getIdJugador2()."</div></a>";
            }
        echo "</div>";

            
        echo "<div class='columnas'>";
        echo "<h3>Semifinal</h3>";

          echo "<div class='semifinal'>";
          foreach($datosTorneos as $jugador){
           
                echo" <a href='jugadorVistaFicha.php?id=".$jugador->getId()."'> 
                <div class='jugadorCuarto'>Semi</div></a>";
                }
         
            echo "</div>";
        echo "</div>";

        echo "<div class='columnas'>";
        echo "<h3>Final</h3>";

            echo  "<div class='final'>";
            
                foreach($datosTorneos as $jugador){
                   
                        echo" <a href='jugadorVistaFicha.php?id=".$jugador->getId()."'> 
                        <div class='jugadorCuarto'>Prueba</div></a>";
                        }
            echo "</div>";
        echo "</div>";


        echo "<div class='columnas'>";
           echo "<h3>";
            echo "<div class='titulo'>Campeón</div>";
           echo "</h3>";

            echo "<a href=''>  <div class='campeon'>Prueba</div></a>";
            echo "</div>";
        echo "</div>";
        
        
    echo "</div>";

   
    ?>
</body>

</html>