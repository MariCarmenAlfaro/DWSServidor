<?php

require("../AccesoDatos/jugadoresAccesoDatos.php");

require("../AccesoDatos/partidosAccesoDatos.php");
ini_set("display_errors", "On");
ini_set("html_errors",0);
class JugadoresReglasNegocio
{
  private $_id;
  private $_nombreJugador;
  private $_jugador1;
  private $_jugador2;
  private $_ganador;


  function __construct()
  {
  }

  function init($id,$nombreJugador)
  {
    $this->_id = $id;
    $this->_nombreJugador = $nombreJugador;

  }
  function init1($id,$nombreJugador)
  {
    $this->_id = $id;
    $this->_nombreJugador = $nombreJugador;
  }

function initJoin($jugador1, $jugador2, $ganador){
  $this->_jugador1 = $jugador1;
  $this->_jugador2 = $jugador2;
  $this->_ganador = $ganador;
}

  function getId()
  {
    return $this->_id;
  }
  function getNombreJugador()
  {
    return $this->_nombreJugador;
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




  function obtenerDatosJugadores()
  {
    $jugadores = new JugadoresAccesoDatos();
    
    $datosJugadoresPartido = $jugadores->obtenerDatosJugadores();

    $listaJugadores= array();
  

  foreach($datosJugadoresPartido as $player){
    $resultado=new JugadoresReglasNegocio();
    $resultado->Init($player['id'],$player['nombreJugador']);
   
    array_push($listaJugadores, $resultado);
  }
  
    return $listaJugadores;
  }
  function obtenerJugadoresDePartidos($idTorneo, $tipoPartido )
  {
    $jugadores = new JugadoresAccesoDatos();
    
    $datosJugadoresPartido = $jugadores->obtenerJugadoresDePartidos($idTorneo, $tipoPartido);

    $listaJugadores= array();
  

  foreach($datosJugadoresPartido as $player){
    
    $resultado=new JugadoresReglasNegocio();
    
    $resultado->initJoin($player['jugador1'],$player['jugador2'], $player['ganador']);
  
    array_push($listaJugadores, $resultado);
  }
  
    return $listaJugadores;
  }
  function obtenerDatosJugadorFicha($idTorneo, $tipoPartido)
  {
    $jugadores = new JugadoresAccesoDatos();
    $datosJugadores = $jugadores->obtenerDatosJugadorFicha($idTorneo,$tipoPartido);

   

    return $datosJugadores;
  }


  
}