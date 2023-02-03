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

  $jugadoresPartido = new JugadoresReglasNegocio();

  $id=$_GET['idTorneo'];

  
   $partidoCuartos = $jugadoresPartido->obtenerJugadoresDePartidos($id, "Cuartos");

   $partidoSemiFinal = $jugadoresPartido->obtenerJugadoresDePartidos($id, "Semifinal");

   $partidoFinal = $jugadoresPartido->obtenerJugadoresDePartidos($id, "Final");

   

    echo "<div class='tabla'>"; 

        echo "<div class='columnas'>";
        echo " <h3>Cuartos</h3>";
         
            foreach($partidoCuartos as $jugador){
               print_r($jugador->getId());
                echo "<div class='cuartos'>";
                
                echo" <a href='jugadorVistaFicha.php?id='> <div class='jugadorCuarto'>".$jugador->getJugador1()."</div></a>";
                echo" <a href='jugadorVistaFicha.php?id='> <div class='jugadorCuarto'>".  $jugador->getJugador2()."</div></a>  </div>";
            }
        echo "</div>";

            
        echo "<div class='columnas'>";
        echo "<h3>Semifinal</h3>";

         
          foreach($partidoSemiFinal as $jugadorSemi){
            echo "<div class='semifinal'>";
                echo" <a href='jugadorVistaFicha.php?id='> 
                <div class='jugadorSemi'>".$jugadorSemi->getJugador1()."</div></a>";

                echo" <a href='jugadorVistaFicha.php?id='> 
                <div class='jugadorSemi'>".$jugadorSemi->getJugador2()."</div></a> </div>";

                }
         
           
        echo "</div>";

        echo "<div class='columnas'>";
        echo "<h3>Final</h3>";
                foreach($partidoFinal as $jugadorFinal){
                        echo  "<div class='final'>";
                   
                        echo" <a href='jugadorVistaFicha.php?id='> 
                        <div class='jugadorFinal'>".$jugadorFinal->getJugador1()."</div></a> ";

                        echo" <a href='jugadorVistaFicha.php?id='> 
                        <div class='jugadorFinal'>".$jugadorFinal->getJugador2()."</div></a> </div>";

                        }
        echo "</div>";


        echo "<div class='columnas'>";
           echo "<h3>";
            echo "<div class='titulo'>Campeón</div>";
           echo "</h3>";

            echo "<a href='jugadorVistaFicha.php?id='>
            <div class='campeon'>".$jugadorFinal->getGanador()."</div></a>";
            echo "</div>";
        echo "</div>";
        
        
    echo "</div>";

   
    ?>

</body>

</html>