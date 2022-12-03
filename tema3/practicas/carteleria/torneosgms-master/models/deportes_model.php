<?php
class deportes_model {

private $db;
private $deportes;

private $id;
private $nombre;



public function __construct(){
    $this->db=Conectar::conexion();
    $this->deportes=array();
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
* Extreu tots els cotxes de la taula
* @return array Bidimensional de tots els cotxes de la taula
*/
public function get_deportes(){
    $consulta=$this->db->query("select * from deportes;");
    while($filas=$consulta->fetch_assoc()){
        $this->deportes[]=$filas;
    }
    return $this->deportes;
}


/**
* Inserta un registre a la taula
* @return [false]  si no hi ha hagut cap error,
*         [string] amb text d'error si no ha anat bé
*/
public function insertar() {
     $sql = "INSERT INTO deportes (nombre)
             VALUES ('{$this->nombre}')";
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
    $sql = "DELETE FROM deportes WHERE id_deporte='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}


/**
 * Extreu tots els cotxes de la taula ordenats per marca
 * @return array Registres ordenats per marca
 */
public function ordPuntosDesc(){
    $consulta=$this->db->query("select * from deportes ORDER BY marca");
    while($filas=$consulta->fetch_assoc()){
        $this->deportes[]=$filas;
    }
    return $this->deportes;
}

}
?>
