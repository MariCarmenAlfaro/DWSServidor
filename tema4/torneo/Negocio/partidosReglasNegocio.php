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
  private $_idJugador1;
  private $_idJugador2;
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
  function getId()
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
   function getIdJugador1()
  {
    return $this->_idJugador1;
  } 
  function getIdJugador2()
  {
    return $this->_idJugador2;
  } 
   function getGanador()
  {
    return $this->_ganador;
  }

 function crearPartido($jugadorA,$jugadorB, $ronda, $idTorneo){
  $partido= new PartidosAccesoDatos();
  $partido->crearPartido($jugadorA,$jugadorB, $ronda, $idTorneo);
 }
  function modificarPartido($id,$ganador){
  $partidoGanador= new PartidosAccesoDatos();
  $partidoGanador->modificarPartido($id,$ganador);
}
  function insertarPartidosNuevosTorneo($idTorneo){
    $partidosDAL = new PartidosAccesoDatos();
    $jugadores = new JugadoresAccesoDatos();
    $jugadoresDatos= $jugadores->obtenerDatosJugadores();
    $jugadoresArray=[];

    foreach($jugadoresDatos as $jugadorId){
      array_push($jugadoresArray, $jugadorId['id']);
    }
    shuffle($jugadoresArray);
    for ($i=0; $i <=6 ; $i=$i+2) { 
 
    $partidosDAL->crearPartido($jugadoresArray[$i],$jugadoresArray[$i+1], "Cuartos",$idTorneo);

    }
   
  } 
  function obtenerDatosListaPartido($idTorneo){
    $datosPartidos = new PartidosAccesoDatos();
   $rs= $datosPartidos->obtenerDatosListaPartido($idTorneo);

   $listaPartidos =  array();

   
   foreach ($rs as $partidos) {
    $oTorneosReglasNegocio = new PartidosReglasNegocio();
    $oTorneosReglasNegocio->Init($partidos['id'], $partidos['idTorneo'], $partidos['tipoPartido'], $partidos['idJugador1'],$partidos['idJugador2'],$partidos['ganador']);
  
    array_push($listaPartidos, $oTorneosReglasNegocio);
  }


  return $listaPartidos;
   
   
  }
}