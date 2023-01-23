<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>Hola</h1>
</head>
<body>    
<?php    
require("torneoReglasNegocio.php");
    ini_set("display_errors", "On");
    ini_set("html_errors", 0);
    $torneosBL = new TorneosReglasNegocio();
   $datosTorneos = $torneosBL->insertarNuevosTorneos()
   
  ?>
</body>
</html>