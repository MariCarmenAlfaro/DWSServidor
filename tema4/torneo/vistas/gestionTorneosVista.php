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
    <div class="contenedorLogin">
    <form action="../Vistas/insertarTorneo.php" method="post">
        <p class="datosLogin">Nombre</p>

        <input type="text" name="nombreTorneo" id="">
        <p class="datosLogin">Fecha</p>

        <input type="date" name="fecha" id="">
        <input type="submit" value="Crear torneo">
    </form>
    </div>
    <?php
    require("../Negocio/torneoReglasNegocio.php");
    ini_set("display_errors", "On");
    ini_set("html_errors", 0);
    $torneosBL = new TorneosReglasNegocio();
    $nombreTorneo=$_POST['nombreTorneo'];
    $fechaTorneo =$_POST['fecha'];
    $datosTorneos = $torneosBL->insertarNuevosTorneos($nombreTorneo,$fechaTorneo);
   

    ?>
</body>
</html>