<?php
class jugadores_model{

private $db;

private $jugadores;

private $id;
private $nombre;
private $apellidos;
private $email;
private $sexo;
private $id_equipo;
private $dorsal;



public function __construct(){
    $this->db=Conectar::conexion();
    $this->jugadores=array();
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

public function getApellidos() {
    return $this->apellidos;
}
  
public function setApellidos($apellidos) {
    $this->apellidos = $apellidos;
}

public function getEmail() {
    return $this->email;
}
  
public function setEmail($email) {
    $this->email = $email;
}

public function getSexo() {
    return $this->sexo;
}
  
public function setSexo($sexo) {
    $this->sexo = $sexo;
}


public function getId_equipo() {
    return $this->id_equipo;
}
  
public function setId_equipo($id_equipo) {
    $this->id_equipo = $id_equipo;
}

public function getDorsal() {
    return $this->dorsal;
}
  
public function setDorsal($dorsal) {
    $this->dorsal = $dorsal;
}



/**
 * Extrae todos los jugadores de la tabla
* @return array Bidimensional de todos los jugadores
*/
public function get_jugadores(){
    $consulta=$this->db->query("SELECT *,equipos.nombre as nombreequipo, jugadores.nombre as nombrejugador FROM jugadores JOIN equipos ON jugadores.id_equipo = equipos.id_equipo;");

    while($filas=$consulta->fetch_assoc()){
        $this->jugadores[]=$filas;
    }

    return $this->jugadores;
}

/**
 * Extrae todos los equipos de la tabla
* @return array Bidimensional de todos los equipos
*/
 public function get_equiposView(){

    $consulta=$this->db->query("select * from equipos");
    while($filas=$consulta->fetch_assoc()){
      $this->equipos[]=$filas;
    }
    return $this->equipos;
  }

/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function insertar() {


    if ($this->id_equipo == "Ninguno") {
        $sql = "INSERT INTO jugadores (nombre, apellidos, email, sexo, dorsal) VALUES ('{$this->nombre}','{$this->apellidos}','{$this->email}','{$this->sexo}','{$this->dorsal}')";
      }else {
        $sql = "INSERT INTO jugadores (nombre, apellidos, email, sexo, dorsal, id_equipo) VALUES ('{$this->nombre}','{$this->apellidos}','{$this->email}','{$this->sexo}','{$this->dorsal}','{$this->id_equipo}')";
      }


    
     $result = $this->db->query($sql);

     if ($this->db->error)
         return "$sql<br>{$this->db->error}";
     else {
         return false;
     }
}


/**
* Esborra un registre de la taula
* @param  int $id Identificador del registre
* @return [false]  si no hi ha hagut cap error,
*         [string] amb text d'error si no ha anat bé
*/
public function delete($id) {
    $sql = "DELETE FROM jugadores WHERE id_jugador='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}
}
?>
