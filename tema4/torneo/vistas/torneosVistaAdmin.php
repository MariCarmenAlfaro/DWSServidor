<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estiloFinal.css">
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
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['usuario']))
        {
            header("Location: login.php");
        }
    ?>


 
    <?php echo "Bienvenido: ".$_SESSION['usuario']; ?>
    <br>
    <a href="logout.php"> Cerrar sesión </a>

        <?php
        require("../Negocio/torneoReglasNegocio.php");
        ini_set("display_errors", "On");
        ini_set("html_errors", 0);
        $torneosBL = new TorneosReglasNegocio();
        $datosTorneos = $torneosBL->obtenerDatosListaTorneo();
        echo "<div >";
         $i=0;
        echo "<a href='../Vistas/gestionTorneosVista.php'>Crear torneo</a>";
        foreach ($datosTorneos as $torneo) {
           
            echo "<tr class='listaTorneos'>";
            echo "<td>";
            print($torneo->getID());
            echo "</td>";

            echo "<td>";
            print($torneo->getName());
            echo "</td>";

            echo "<td>";
            print($torneo->getDate());
            echo "</td>";
            
            echo "<td>";
            
            echo "</td>";

            echo "<td>";
          
            echo "</td>";
            
            echo "<td>";
            echo "<a href='partidos.php'>Editar</a>";
            echo "</td>";

            echo "<td>";
             echo "<a href='eliminarTorneo.php?id=".$torneo->getID()."'>Borrar</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</div>";

        ?>
    </table>
</body>

</html>