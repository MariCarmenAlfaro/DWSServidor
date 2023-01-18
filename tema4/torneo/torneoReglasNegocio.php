<?php

require("torneoAccesoDatos.php");
ini_set("display_errors", "On");
ini_set("html_errors",0);
class TorneosReglasNegocio
{
  private $_ID;
  private $_Name;
  function __construct()
  {
  }

  function init($id,$Name)
  {
    $this->_ID = $id;
    $this->_Name = $Name;
  }

  function getID()
  {
    return $this->_ID;
  }
  function getName()
  {
    return $this->_Name;
  }


  function obtener()
  {
    $torneosDAL = new TorneosAccesoDatos();
    $rs = $torneosDAL->obtener();

    $listaTorneos =  array();

    foreach ($rs as $torneo) {
      $oTorneosReglasNegocio = new TorneosReglasNegocio();
      $oTorneosReglasNegocio->Init($torneo['id'],$torneo['nombreTorneo']);
    
      array_push($listaTorneos, $oTorneosReglasNegocio);
    }

    return $listaTorneos;
  }
}
