<?php

require("../AccesoDatos/jugadoresAccesoDatos.php");

require("../AccesoDatos/partidosAccesoDatos.php");
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

  function obtenerDatosJugadorFicha($idTorneo, $tipoPartido)
  {
    $jugadores = new JugadoresAccesoDatos();
    $datosJugadores = $jugadores->obtenerDatosJugadorFicha($idTorneo,$tipoPartido);

   

    return $datosJugadores;
  }


  
}