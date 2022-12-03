<?php
//Llamada al modelo
require_once("models/equipos_model.php");


class equipos_controller {

/**
 * Muestra pantalla 'add'
 * @return No
 */
function add() {
  require_once("views/equipos_add.phtml");
}


/**
 * Mostra llistat
 * @return No
 */
function view() {
  $equipo=new equipos_model();

  //Uso metodo del modelo de equipos
  $datos=$equipo->get_equipos();

  //Llamado a la vista: mostrar la pantalla
  require_once("views/equipos_view.phtml");
}


/**
 * Inserta a la taula
 * @return No
 */
function insert() {
    $equipo=new equipos_model();

    if (isset($_POST['insert'])) {

        $equipo->setNombre( $_POST['nombre'] );
        
        $error = $equipo->insertar();

        if (!$error) {
            header( "Location: index.php?controller=equipos&action=view");
        }
        else {
            echo $error;
        }
    }
}


/**
 * Elimina una fila de la tabla
 * @return No
 */
function delete() {
  if (isset($_GET['id'])) {
    $equipo=new equipos_model();

    $id = $_GET['id'];

    $error = $equipo->delete($id);

    if (!$error) {
        header( "Location: index.php?controller=equipos&action=view");
    }
    else {
        echo $error;
    }
  }
}



/**
 * Muestra los equipos ordenados por puntos
 * @return No
 */
 function ordPuntosDesc() {
    $equipo=new equipos_model();

    //Uso metodo del modelo de equipos
    $datos=$equipo->ordPuntosDesc();

    //Llamado a la vista: mostrar la pantalla
    require_once("views/equipos_view.phtml");
  }

  /**
 * Muestra los equipos ordenados por puntos
 * @return No
 */
 function ordPuntosAsc() {
    $equipo=new equipos_model();

    //Uso metodo del modelo de equipos
    $datos=$equipo->ordPuntosAsc();

    //Llamado a la vista: mostrar la pantalla
    require_once("views/equipos_view.phtml");
  }


  /**
 * Muestra los equipos ordenados por nombre
 * @return No
 */
 function ordNombreAsc() {
    $equipo=new equipos_model();

    //Uso metodo del modelo de equipos
    $datos=$equipo->ordNombreAsc();

    //Llamado a la vista: mostrar la pantalla
    require_once("views/equipos_view.phtml");
  }

  /**
 * Muestra los equipos ordenados por nombre
 * @return No
 */
 function ordNombreDesc() {
    $equipo=new equipos_model();

    //Uso metodo del modelo de equipos
    $datos=$equipo->ordNombreDesc();

    //Llamado a la vista: mostrar la pantalla
    require_once("views/equipos_view.phtml");
  }

}
?>
