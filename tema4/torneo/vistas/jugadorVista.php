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
    require("../Negocio/torneoReglasNegocio.php");
   $jugadores = new TorneosReglasNegocio();
   $datosTorneos = $jugadores->obtenerDatosJugadores();
 echo "<div class='tabla'>";

     echo "<div class='columnas'>";
     echo " <h3>Cuartos</h3>";
        foreach($datosTorneos as $jugador){
        echo "<div class='cuartos'>";
            echo" <a href='jugadorVistaFicha.php?id=$_GET($id)'> <div class='jugadorCuarto'>".  $jugador->getNAME()."</div></a>";
}
               echo "</div>";
    echo "</div>";           
 echo "</div>";
                ?>
              <!--  <a href=""> <div class="jugadorCuarto"> Prueba </div></a>
                <a href=""> <div class="jugadorCuarto"> Prueba </div></a>
                <a href=""> <div class="jugadorCuarto"> Prueba </div></a>
                <a href=""> <div class="jugadorCuarto"> Prueba </div></a>
                <a href=""> <div class="jugadorCuarto"> Prueba </div></a>
                <a href=""> <div class="jugadorCuarto"> Prueba </div></a>
                <a href=""> <div class="jugadorCuarto"> Prueba </div></a>

            </div>
        </div>
        <div class="columnas">
            <h3>Semifinal</h3>

            <div class="semifinal">
                <a href=""><div class="jugadorSemi">Prueba</div></a>
                <a href=""><div class="jugadorSemi">Prueba</div></a>
                <a href=""><div class="jugadorSemi">Prueba</div></a>
                <a href=""><div class="jugadorSemi">Prueba</div></a>

         
            </div>
        </div>


        <div class="columnas">
            <h3>Final</h3>

            <div class="final">
                <a href=""><div class="jugadorFinal">Prueba</div></a>
                <a href=""><div class="jugadorFinal">Prueba</div></a>
            </div>
        </div>


        <div class="columnas">
            <h3>
             <div class="titulo">Campeón</div>
            </h3>

             <a href="">  <div class="campeon">Prueba</div></a>
        </div>


    </div>-->
    
</body>

</html>