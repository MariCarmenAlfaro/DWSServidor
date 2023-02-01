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
          ini_set("display_errors", "On");
          ini_set("html_errors", 0);
          $torneosBL = new TorneosReglasNegocio();
          $datosTorneos=$torneosBL->obtenerDatosListaTorneo();
          
          
        echo "<div class='contenedorLogin'>";
    
        echo "<form action='../Vistas/insertarTorneo.php' method='post'>";
  
        echo "<p class='datosLogin'>Nombre</p>";

        echo "<input type'text' name='nombreTorneo' id=''>";
        echo "<p class='datosLogin'>Fecha</p>";

        echo "<input type='date' name='fecha' id=''>";
        echo "<input type='submit' value='Crear torneo'>";
        echo "</form>";
        echo "</div>";
     


    ?>
</body>
</html>