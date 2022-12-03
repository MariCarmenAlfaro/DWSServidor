<?php
class equipos_model{

private $db;

private $equipos;

private $id;
private $nombre;
private $puntos;



public function __construct(){
    $this->db=Conectar::conexion();
    $this->equipos=array();
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

public function getPuntos() {
    return $this->puntos;
}
  
public function setPuntos($puntos) {
    $this->puntos = $puntos;
}





/**
 * Extrae todos los equipos de la tabla
* @return array Bidimensional de todos los equipos
*/
public function get_equipos(){
    $consulta=$this->db->query("SELECT * FROM equipos;");

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

     $sql = "INSERT INTO equipos (nombre) VALUES ('{$this->nombre}')";
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
    $sql = "DELETE FROM equipos WHERE id_equipo='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}


/**
 *  Extrae todos los coches de la tabla ordenados por puntos
 * @return array Registros ordenados por puntos
 */
 public function ordPuntosDesc(){
    $consulta=$this->db->query("SELECT * FROM equipos ORDER BY puntos DESC;");
    while($filas=$consulta->fetch_assoc()){
        $this->equipos[]=$filas;
    }
    return $this->equipos;
}

/**
 *  Extrae todos los coches de la tabla ordenados por puntos
 * @return array Registros ordenados por puntos
 */
 public function ordPuntosAsc(){
    $consulta=$this->db->query("SELECT * FROM equipos ORDER BY puntos ASC;");
    while($filas=$consulta->fetch_assoc()){
        $this->equipos[]=$filas;
    }
    return $this->equipos;
}

/**
 * Extrae todos los coches de la tabla ordenados por nombre
 * @return array Registros ordenados por nombre
 */
 public function ordNombreAsc(){
    $consulta=$this->db->query("SELECT * FROM equipos ORDER BY nombre ASC;");
    while($filas=$consulta->fetch_assoc()){
        $this->equipos[]=$filas;
    }
    return $this->equipos;
}

/**
 * Extrae todos los coches de la tabla ordenados por nombre
 * @return array Registros ordenados por nombre
 */
 public function ordNombreDesc(){
    $consulta=$this->db->query("SELECT * FROM equipos ORDER BY nombre DESC;");
    while($filas=$consulta->fetch_assoc()){
        $this->equipos[]=$filas;
    }
    return $this->equipos;
}


}
?>
