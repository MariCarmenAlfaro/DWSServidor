<?php

require("../AccesoDatos/torneosAccesoDatos.php");
function test_listadoTorneos(){
    $torneosDAL = new TorneosAccesoDatos();
  return $rs = $torneosDAL->obtenerDatosListaTorneo();

}
var_dump(test_listadoTorneos());