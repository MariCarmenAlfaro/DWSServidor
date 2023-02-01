<?php

require("../AccesoDatos/jugadoresAccesoDatos.php");
ini_set("display_errors", "On");
ini_set("html_errors",0);
class JugadoresReglasNegocio
{
  private $_id;
  private $_nombreJugador;

  function __construct()
  {
  }

  function init($id,$nombreJugador)
  {
    $this->_id = $id;
    $this->_nombreJugador = $nombreJugador;

  }

  function getId()
  {
    return $this->_id;
  }
  function getNombreJugador()
  {
    return $this->_nombreJugador;
  }
  function obtenerDatosJugadores()
  {
    $torneosDAL = new JugadoresAccesoDatos();
    $rs = $torneosDAL->obtenerDatosJugadores();

    $listaJugadores =  array();

    foreach ($rs as $jugadores) {
      $oTorneosReglasNegocio = new JugadoresReglasNegocio();
      $oTorneosReglasNegocio->Init($jugadores['id'],$jugadores['nombreJugador']);
    
      array_push($listaJugadores, $oTorneosReglasNegocio);
    }
    return $listaJugadores;
  }

  function obtenerDatosJugadorFicha($id)
  {
    $torneosDAL = new JugadoresAccesoDatos();
    $rs = $torneosDAL->obtenerDatosJugadorFicha(1);

   
    foreach ($rs as $jugadores) {
      $oTorneosReglasNegocio = new JugadoresReglasNegocio();
      $oTorneosReglasNegocio->Init($jugadores['id'],$jugadores['nombreJugador']);
    }
  

    return $oTorneosReglasNegocio;
  }


  
}