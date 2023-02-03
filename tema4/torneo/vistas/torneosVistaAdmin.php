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
        session_start();
        if (!isset($_SESSION['usuario']))
        {
            header("Location: login.php");
        }
    ?>


 
    <?php echo "<h2>Bienvenido/a: ".$_SESSION['usuario']."</h2>;" ?>
    <br>
    <a href="logout.php" class="boton"> Cerrar sesión </a>

        <?php
        require("../Negocio/torneoReglasNegocio.php");
        ini_set("display_errors", "On");
        ini_set("html_errors", 0);
        $torneosBL = new TorneosReglasNegocio();
        $datosTorneos = $torneosBL->obtenerDatosListaTorneo();
        echo "<div >";
     
        echo "<a href='../Vistas/gestionTorneosVista.php?type=create' class='boton'>Crear torneo</a>";
        foreach ($datosTorneos as $torneo) {
           
            echo "<tr class='listaTorneos'>";
            echo "<td>";
            print($torneo->getId());
            echo "</td>";

            echo "<td>";
            print($torneo->getNombreTorneo());
            echo "</td>";

            echo "<td>";
            print($torneo->getFecha());
            echo "</td>";
            
            echo "<td>";
            
            echo "</td>";

            echo "<td>";
          
            echo "</td>";
            
            echo "<td>";
            echo "<a href='gestionTorneosVista.php?type=edit&idTorneo=".$torneo->getId()."'>Editar</a>";
            echo "</td>";

            echo "<td>";
             echo "<a href='gestionTorneosVista.php?type=delete&idTorneo=".$torneo->getId()."&name=".$torneo->getNombreTorneo()."'>Borrar</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</div>";

        ?>
    </table>
</body>

</html>