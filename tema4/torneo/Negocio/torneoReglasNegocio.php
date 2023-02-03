<?php

require("../AccesoDatos/torneoAccesoDatos.php");
ini_set("display_errors", "On");
ini_set("html_errors",0);
class TorneosReglasNegocio
{
  private $_id;
  private $_nombreTorneo;
  private $_numeroJugadores;
  private $_fecha;
  
  function __construct()
  {
  }

  function init($id,$nombreTorneo,$fecha,$numeroJugadores)
  {
    $this->_id = $id;
    $this->_nombreTorneo = $nombreTorneo;
    $this->_fecha = $fecha;
    $this->_numeroJugadores=$numeroJugadores;
   
    
  }

  function getId()
  {
    return $this->_id;
  }
  function getNombreTorneo()
  {
    return $this->_nombreTorneo;
  }
    function getNumeroJugadores()
  {
    return $this->_numeroJugadores;
  }
  function getFecha()
  {
    return $this->_fecha;
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
    $jugadores = new JugadoresAccesoDatos();
    $nombreTorneo=$_POST['nombreTorneo'];
    $fechaTorneo =$_POST['fecha'];


    $torneosDAL->insertarNuevosTorneos($nombreTorneo,$fechaTorneo);

  }
  function obtenerIdUtlimoTorneo(){
    $torneosDAL = new TorneosAccesoDatos();
   return $torneosDAL->obtenerIdUtlimoTorneo();
  }

  function eliminarTorneo($id){
    $torneosDAL = new TorneosAccesoDatos();
   $torneosDAL->eliminarTorneo($id);
  }

}
