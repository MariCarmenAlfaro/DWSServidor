<?php

require("../AccesoDatos/torneoAccesoDatos.php");
ini_set("display_errors", "On");
ini_set("html_errors",0);
class TorneosReglasNegocio
{
  private $_ID;
  private $_Name;
  private $_Date;
  private $_NumPlayer;
  function __construct()
  {
  }

  function init($id,$Name, $Date,$NumPlayer)
  {
    $this->_ID = $id;
    $this->_Name = $Name;
    $this->_Date = $Date;
    $this->NumPlayer=$NumPlayer;
  }

  function getID()
  {
    return $this->_ID;
  }
  function getName()
  {
    return $this->_Name;
  }
  function getDate()
  {
    return $this->_Date;
  }
  function getNumPlayer()
  {
    return $this->_NumPlayer;
  }

  function obtenerDatosListaTorneo()
  {
    $torneosDAL = new TorneosAccesoDatos();
    $rs = $torneosDAL->obtenerDatosListaTorneo();

    $listaTorneos =  array();

    foreach ($rs as $torneo) {
      $oTorneosReglasNegocio = new TorneosReglasNegocio();
      $oTorneosReglasNegocio->Init($torneo['id'],$torneo['nombreTorneo'],$torneo['fecha'],
      $torneo['numeroJugadores']);
    
      array_push($listaTorneos, $oTorneosReglasNegocio);
    }

    return $listaTorneos;
  }
  function insertarNuevosTorneos(){
    $torneosDAL = new TorneosAccesoDatos();
    $nombreTorneo=$_POST['nombreTorneo'];
    $fechaTorneo =$_POST['fecha'];
    $rs = $torneosDAL->insertarNuevosTorneos($nombreTorneo,$fechaTorneo);

  }
}
