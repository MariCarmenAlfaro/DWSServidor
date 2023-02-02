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

    //primero se crea el torneo para luego poderle decir a los partidos que tonreo es
    $torneosDAL->insertarNuevosTorneos($nombreTorneo,$fechaTorneo);
 
    //hacer llamada a base de datos para obtener id de jugadores; 

    //bucle de 4 para crear 4 partidos
    // array de los jugadores. En cada pasada del bucle, cogemos dos jugadores y llamamos
    // a la función crear partido. Se hace un random para obtener la posición. 
    // Después de obtener los jugadores o después de crear el partido, se eliminan 
    // los dos jugadores seleccionados del array de jugadores.

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
