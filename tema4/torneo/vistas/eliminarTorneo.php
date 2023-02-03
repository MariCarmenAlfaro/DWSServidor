<?php
require("../Negocio/torneoReglasNegocio.php");
$respuesta=$_POST['confirmacion'];

    if($respuesta= 'si'){
                     $torneosBL = new TorneosReglasNegocio();
                    $id = $_GET['idTorneo'];
                    $nombreTorneo=$_GET['name'];
                   $torneosBL->eliminarTorneo($id);
                    
                    header("Location:torneosVistaAdmin.php");
    }else{
        header("Location:torneosVistaAdmin.php");
    }
                    
                    