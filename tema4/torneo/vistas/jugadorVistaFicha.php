<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugador</title>
    <link rel="stylesheet" href="../css/estiloFinal.css">
</head>
<body>
    <?php
require("../Negocio/jugadoresReglasNegocio.php");
   $jugadores = new JugadoresReglasNegocio();
 
  $jugador = $jugadores->obtenerDatosJugadorFicha($_GET['id']);
 
 
  
  echo " <br>prueba2 <br>";
  echo $jugador->getNombreJugador();
  echo $jugador->getId();

   ?>
    <div class="contenedor">
        <h1 class="tituloFicha">Ficha</h1>
        <p class="datosFicha">Nombre:<?php echo $jugador->getNombreJugador(); ?></p>
        <p class="datosFicha">Total de partidos jugados: </p>
        <p class="datosFicha">Porcentaje de victorias: </p>
        <p class="datosFicha">Total de torneos disputados:</p>
        <p class="datosFicha">Torneos ganados: </p>

    </div>
</body>
</html>