<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>

</head>
<body>    
<?php    
require("../Negocio/torneoReglasNegocio.php");

    ini_set("display_errors", "On");
    ini_set("html_errors", 0);
    $torneosBL = new TorneosReglasNegocio();
   $torneosBL->eliminarTorneo($_POST($id));
   header("Location:torneosVistaAdmin.php");
  ?>
</body>
</html>