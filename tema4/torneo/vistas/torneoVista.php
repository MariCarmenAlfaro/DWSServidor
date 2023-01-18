<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneos</title>
    <link rel="stylesheet" href="../css/estiloFinal.css">
</head>
<body>
    <a href="gestionTorneosVista.php">Crear torneo</a>
    <p>Número de registros: </p>

    <table class="tablaTorneo">
        <tr class="tablaTorneo">
            <th>ID</th>
            <th>Nombre del torneo</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Campeón</th>
        </tr>
        <tr>
            <?php
            require("torneoReglasNegocio.php");
               while ($myrow = $result->fetch_assoc()) 
               {
                   echo $myrow['titulo'];
               }
               ?>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>