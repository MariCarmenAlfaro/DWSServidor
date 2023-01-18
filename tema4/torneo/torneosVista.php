<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estiloFinal.css">
</head>

<body>
    <h1> Listado de torneos </h1>
    <table class="listaTorneos"> 
        <tr>
            <td>ID</td>
            <td>Nombre del torneo</td>
            <td>Fecha</td>
            <td>Estado</td>
            <td>Campeón</td>
        </tr>
        <?php
        require("torneoReglasNegocio.php");
        ini_set("display_errors", "On");
        ini_set("html_errors", 0);
        $torneosBL = new TorneosReglasNegocio();
        $datosTorneos = $torneosBL->obtener();
        echo "<div >";

        foreach ($datosTorneos as $torneo) {
            echo "<tr class='listaTorneos'>";
            echo "<td>";
            print($torneo->getID());
            echo "<a>Editar</a>";
            echo "<a>Borrar</a>";
            echo "</td>";
            echo "<td>";
            print($torneo->getName());
            echo "<a>Editar</a>";
            echo "<a>Borrar</a>";
            echo "</td>";
        

            echo "</tr>";
        }

        echo "</div>";

        ?>
    </table>
</body>

</html>