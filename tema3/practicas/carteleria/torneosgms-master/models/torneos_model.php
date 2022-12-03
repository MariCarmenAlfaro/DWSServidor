<?php
class torneos_model{

private $db;

private $torneos;

private $id;
private $nombre;


public function __construct(){
    $this->db=Conectar::conexion();
    $this->torneos=array();
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
 * Extrae todos los torneos de la tabla
* @return array Bidimensional de todos los torneos
*/
public function get_torneos(){
    $consulta=$this->db->query("select * from torneos;");

    while($filas=$consulta->fetch_assoc()){
        $this->torneos[]=$filas;
    }

    return $this->torneos;
}


/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function insertar() {

     $sql = "INSERT INTO torneos (nombre) VALUES ('{$this->nombre}')";
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
    $sql = "DELETE FROM torneos WHERE id_torneo='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}
}
?>
