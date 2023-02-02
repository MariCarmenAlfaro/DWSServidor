<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilosFinal.css">
</head>
<body>
    <?php

   require("../Negocio/jugadoresReglasNegocio.php");
 
   $jugadoresBL= new JugadoresReglasNegocio();
   $datosJugadores= $jugadoresBL->obtenerDatosJugadores();
    echo "<div>";
    echo "<form>";
    echo "<form action='../Vistas/' method='post'>";
          
    echo "<p class='datosLogin'>Jugador A</p>";
    echo "<select name='jugadores' id=''>";
    foreach($datosJugadores as $jugador){
    echo "<option value='jugadorA'>".$jugador->getNombreJugador()."</option>";
}
    echo "</select>";
    echo "<p class='datosLogin'>Jugador B</p>";
    echo "<select name='jugadores' id=''>";
    foreach($datosJugadores as $jugador){
    echo "<option value='jugadorB'>".$jugador->getNombreJugador()."</option>";
}
    echo "</select>";
    echo "<p class='datosLogin'>Ronda</p>";
    echo "<select name='jugadores' id=''>";
  
    echo "<option value='jugadorB'>Cuartos</option>";
    echo "<option value='jugadorB'>Semifinal</option>";
    echo "<option value='jugadorB'>Final</option>";
    echo "</select>";

    echo "<p class='datosLogin'>Ganador</p>";
    echo "<select name='jugadores' id=''>";
    foreach($datosJugadores as $jugador){
    echo "<option value='jugadorB'>".$jugador->getNombreJugador()."</option>";
}
    echo "</select>";
    echo "</form>";
    echo "</div>";

    ?>
</body>
</html>