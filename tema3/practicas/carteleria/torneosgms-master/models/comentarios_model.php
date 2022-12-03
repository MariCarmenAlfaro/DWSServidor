<?php
class comentarios_model{

private $db;

private $comentarios;

private $id;
private $mensaje;
private $idPartido;
private $equipoLocal;
private $equipoVisitante;
private $golLocal;
private $golVisitante;
private $puntoLocal;
private $puntoVisitante;



public function __construct(){
    $this->db=Conectar::conexion();
    $this->comentarios=array();
}

/* GETTERS & SETTERS */

public function getId() {
  return $this->id;
}

public function setId($id) {
  $this->id = $id;
}

public function getMensaje() {
  return $this->mensaje;
}

public function setMensaje($mensaje) {
  $this->mensaje = $mensaje;
}

public function getIdPartido() {
    return $this->idPartido;
  }
  
public function setIdPartido($idPartido) {
    $this->idPartido = $idPartido;
  }

public function getEquipoLocal() {
    return $this->equipoLocal;
  }
  
public function setEquipoLocal($equipoLocal) {
    $this->equipoLocal = $equipoLocal;
  }

public function getEquipoVisitante() {
    return $this->equipoLocal;
  }
  
public function setEquipoVisitante($equipoVisitante) {
    $this->equipoVisitante = $equipoVisitante;
  }


public function getGolLocal() {
    return $this->golLocal;
  }
  
public function setGolLocal($golLocal) {
    $this->golLocal = $golLocal;
  }

public function getGolVisitante() {
    return $this->golVisitante;
  }
  
public function setGolVisitante($golVisitante) {
    $this->golVisitante = $golVisitante;
  }

public function getPuntoLocal() {
    return $this->puntoLocal;
  }
  
public function setPuntoLocal($puntoLocal) {
    $this->puntoLocal = $puntoLocal;
  }

public function getPuntoVisitante() {
    return $this->puntoVisitante;
  }
  
public function setPuntoVisitante($puntoVisitante) {
    $this->puntoVisitante = $puntoVisitante;
  }




/**
 * Extrae todos los comentarios de la tabla
* @return array Bidimensional de todos los comentarios
*/
public function get_comentarios(){
    $consulta=$this->db->query("SELECT * FROM comentarios ORDER BY comentarios.id_comentario DESC;");

    while($filas=$consulta->fetch_assoc()){
        $this->comentarios[]=$filas;
    }

    return $this->comentarios;
}

/**
 * Extrae todos los comentarios de la tabla
* @return array Bidimensional de todos los comentarios
*/
public function get_verEquiposXPartido(){
    // GOLES LOCALES, GOL VISITANTE, EQUIPO VISITANTE Y LOCAL, ID PARTIDO
   // SELECT *,equipos.nombre as nombreequipo, jugadores.nombre as nombrejugador FROM jugadores JOIN equipos ON jugadores.id_equipo = equipos.id_equipo;
    $consulta=$this->db->query("SELECT * FROM partidos LEFT JOIN equipos on (partidos.equipo_local = equipos.id_equipo OR partidos.equipo_visitante = equipos.id_equipo) where partidos.id_partido = (SELECT MAX(id_partido) FROM `partidos`);");
// la que estaba puesta  SELECT *,equip, FROM `partidos` LEFT JOIN `equipos` WHERE id_partido = 11
//lito SELECT partidos.id_partido, partidos.goles_local, partidos.goles_visitante, equipos.nombre from equipos join partidos on equipos.id_equipo=partidos.equipo_local
// lito no se si es esta o arriba son iguales SELECT partidos.id_partido, partidos.goles_local, partidos.goles_visitante, equipos.nombre AS equipo_local
//from equipos
//join partidos
//on equipos.id_equipo=partidos.equipo_local

  while($filas=$consulta->fetch_assoc()){
        $this->comentarios[]=$filas;
    }

    return $this->comentarios;
}



/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function insertarGoles() {


    $this->db->query("BEGIN");
    $result = $this->db->query("SELECT MAX(id_partido) FROM partidos;");
    while($row = $result->fetch_assoc()) {  
       $this->$maxId = $row['MAX(id_partido)'];
    }
    
    if(
        // UPDATE `equipos` SET `puntos` = '1' WHERE `equipos`.`id_equipo` = 13;
    $this->db->query("UPDATE partidos SET goles_local = '{$this->golLocal}' WHERE id_partido =  '{$this->$maxId}';") &&
    $this->db->query(" UPDATE partidos SET goles_visitante = '{$this->golVisitante}' WHERE id_partido = '{$this->$maxId}';")){
        $this->db->query("COMMIT");
    }else {        
        $this->db->query("ROLLBACK");
    } 
}



/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function insertar() {

     $sql = "INSERT INTO comentarios (mensaje) VALUES ('{$this->mensaje}')";
     $result = $this->db->query($sql);

     if ($this->db->error)
         return "$sql<br>{$this->db->error}";
     else {
         return false;
     }
}

/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function crearPartido() {

    $sql = "INSERT INTO partidos (equipo_local, equipo_visitante) VALUES ('{$this->equipoLocal}','{$this->equipoVisitante}')";
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
    $sql = "DELETE FROM comentarios WHERE id_comentario='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}


/**
 *Elimina todos los comentarios de la tabla
* @return array Bidimensional de todos los comentarios
*/
public function get_finalizarPartido(){

 $consulta=$this->db->query("TRUNCATE TABLE comentarios;");

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}

}
?>
