<?php
class home_model{

private $db;

private $home;

private $id;
private $nombre;


public function __construct(){
    $this->db=Conectar::conexion();
    $this->home=array();
}

/* GETTERS & SETTERS */

public function getId() {
  return $this->id;
}

public function setId($id) {
  $this->id = $id;
}

public function getNombre() {
  return $this->nombre;
}

public function setNombre($nombre) {
  $this->nombre = $nombre;
}




/**
 * Extrae todos los home de la tabla
* @return array Bidimensional de todos los home
*/
public function get_home(){
    
}



?>
