<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estiloFinal.css">
</head>
<body>
    <?php

   require("../Negocio/jugadoresReglasNegocio.php");
   //require_once("../Negocio/partidosReglasNegocio.php");
   $jugadoresBL= new JugadoresReglasNegocio();
   $datosJugadores= $jugadoresBL->obtenerDatosJugadores();
   $idTorneoActual=$_GET['id'];
   echo $idTorneoActual;
    echo "<div class='contenedorLogin'>";
    echo "<form>";
    echo "<form action='../Vistas/insertarPartido.php?id=".$idTorneoActual."' method='post'>";
    echo "<div class='unidadesPartidoNuevo'>";
    
    echo "<p class='datosLogin'>Jugador A</p>";
    echo "<select name='JugadorA' id=''>";
    foreach($datosJugadores as $jugador){
    echo "<option value='".$jugador->getId()."'>".$jugador->getNombreJugador()."</option>";
}
    echo "</select>";
    echo "</div>";
    echo "<div class='unidadesPartidoNuevo'>";
    echo "<p class='datosLogin'>Jugador B</p>";
    echo "<select name='JugadorB' id=''>";
    foreach($datosJugadores as $jugador){
    echo "<option value='".$jugador->getId()."'>".$jugador->getNombreJugador()."</option>";
}
    echo "</select>";
    echo "</div>";
    echo "<div class='unidadesPartidoNuevo'>";
    echo "<p class='datosLogin'>Ronda</p>";
    echo "<select name='ronda' id=''>";
  
    echo "<option value='Cuartos'>Cuartos</option>";
    echo "<option value='Semifinal'>Semifinal</option>";
    echo "<option value='Final'>Final</option>";
    echo "</select>";
    echo "</div>";
    echo "<div class='unidadesPartidoNuevo'>";
    echo "<p class='datosLogin'>Ganador</p>";
    echo "<select name='Ganador' id=''>";
    foreach($datosJugadores as $jugador){

    echo "<option value='".$jugador->getId()."'>".$jugador->getNombreJugador()."</option>";
}
    echo "</select>";
    echo "</div>";
    echo "<input class='boton' type='submit' value='Guardar'>";
    echo "</form>";
    echo "</div>";
    
    ?>
</body>
</html>