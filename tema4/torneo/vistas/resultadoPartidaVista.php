<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../css/estiloFinal.css">
</head>
<body>
    <?php

   require("../Negocio/jugadoresReglasNegocio.php");

   $jugadoresBL= new JugadoresReglasNegocio();
   
   $datosJugadores= $jugadoresBL->obtenerDatosJugadores();
   
   $idTorneoActual=$_GET['idTorneo'];
   $movimiento;
   if(isset($_GET['type'])){
     $movimiento=$_GET['type'];
        switch ($movimiento) {
             case 'create':
               
            echo "<div class='contenedorLogin'>";
   
                echo "<form action='../Vistas/insertarPartido.php?type=create&idTorneo=".$idTorneoActual."' method='post'>";
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
             break;
            case 'edit':
                $idPartidoActual=$_GET['idPartido'];
                $jugador1=$_GET['idJugador1'];
                $jugador2=$_GET['idJugador2'];
                $tipoPartido=$_GET['tipoPartido'];
                echo "<div class='contenedorLogin'>";
   
                echo "<form action='../Vistas/insertarPartido.php?type=edit&idPartido=".$idPartidoActual."&idTorneo=".$idTorneoActual."' method='post'>";
                echo "<div class='unidadesPartidoNuevo'>";
                
                echo "<p class='datosLogin'>Jugador A</p>";
                
                
                print "Id jugador ".$jugador1."";
               
                echo "</select>";
                echo "</div>";
                echo "<div class='unidadesPartidoNuevo'>";
                echo "<p class='datosLogin'>Jugador B</p>";
                print "Id jugador ".$jugador2."";
               
                echo "</select>";
                echo "</div>";
                echo "<div class='unidadesPartidoNuevo'>";
                echo "<p class='datosLogin'>Ronda</p>";
                print $tipoPartido;
                echo "</div>";
                echo "<div class='unidadesPartidoNuevo'>";
                echo "<p class='datosLogin'>Ganador</p>";
                echo "<select name='Ganador' id=''>";
                
                
                echo "<option value='".$jugador1."'>Jugador ".$jugador1."</option>";
                echo "<option value='".$jugador2."'>Jugador ".$jugador2."</option>";
                echo "</select>";
                
                echo "</div>";
                echo "<input class='boton' type='submit' value='Guardar'>";
                echo "</form>";
                echo "</div>";
                break;
    }
}

    ?>
</body>
</html>