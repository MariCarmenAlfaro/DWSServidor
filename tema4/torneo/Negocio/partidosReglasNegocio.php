<?php

require("../AccesoDatos/partidosAccesoDatos.php");
require("../AccesoDatos/jugadoresAccesoDatos.php");
ini_set("display_errors", "On");
ini_set("html_errors",0);
class PartidosReglasNegocio
{
  private $_id;
  private $_idTorneo;
  private $_tipoPartido;
  private $idJugador1;
  private $idJugador2;
  private $_ganador;

  function __construct()
  {
  }

  function init($id,$idTorneo,$tipoPartido, $idJugador1, $idJugador2, $ganador)
  {
    $this->_id = $id;
    $this->_idTorneo = $idTorneo;
    $this->_tipoPartido = $tipoPartido;
    $this->_idJugador1 = $idJugador1;
    $this->_idJugador2 = $idJugador2;
    $this->_ganador = $ganador;
  }
  function getid()
  {
    return $this->_id;
  } 
   function getIdTorneo()
  {
    return $this->_idTorneo;
  }  
  function getTipoPartido()
  {
    return $this->_tipoPartido;
  } 
   function getJugador1()
  {
    return $this->_jugador1;
  } 
  function getJugador2()
  {
    return $this->_jugador2;
  } 
   function getGanador()
  {
    return $this->_ganador;
  }

  function crearPartido($jugadorA,$jugadorB, $ronda, $idTorneo, $ganador){
    $torneosDAL = new TorneosAccesoDatos();
    $torneosDAL->crearPartido($jugadorA,$jugadorB, $ronda, $idTorneo, $ganador);
  }

  function insertarPartidosNuevosTorneo($idTorneo){
   // TODO controlar bien los id de los jugadores. ya que a veces coge el id 0
    $partidosDAL = new PartidosAccesoDatos();
    $jugadores = new JugadoresAccesoDatos();
    $jugadoresDatos= $jugadores->obtenerDatosJugadores();
     $jugadoresArray=[];
    foreach($jugadoresDatos as $jugadorId){
      array_push($jugadoresArray, $jugadorId['id']);
    }
   
    for ($i=0; $i <4 ; $i++) { 
      $jugador1=rand(1,(count($jugadoresArray)+1));
      unset($jugadoresArray[$jugador1]);
      $jugador2=rand(1,(count($jugadoresArray)+1));
      unset($jugadoresArray[$jugador2]);
      
     // TODO cambiar jugador1 por jugadoresArray[jugador1]
    $partidosDAL->crearPartido($jugador1,$jugador2, "Cuartos",$idTorneo);
    }
   
  }
}