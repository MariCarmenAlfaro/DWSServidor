<?php
//Llamada al modelo
require_once("models/torneos_model.php");


class torneos_controller {

/**
 * Muestra pantalla 'add'
 * @return No
 */
function add() {
  require_once("views/torneos_add.phtml");
}


/**
 * Muestra la página principal
 * @return No
 */
function view() {
  $torneo=new torneos_model();

  //Uso metodo del modelo de torneos
  $datos=$torneo->get_torneos();

  //Llamado a la vista: mostrar la pantalla
  require_once("views/torneos_view.phtml");
}


/**
 * Inserta a la taula
 * @return No
 */
function insert() {
    $torneo=new torneos_model();

    if (isset($_POST['insert'])) {

        $torneo->setNombre( $_POST['nombre'] );
      

        $error = $torneo->insertar();

        if (!$error) {
            header( "Location: index.php");
        }
        else {
            echo $error;
        }
    }
}


/**
 * Elimina una fila de la taula
 * @return No
 */
function delete() {
  if (isset($_GET['id'])) {
    $torneo=new torneos_model();

    $id = $_GET['id'];

    $error = $torneo->delete($id);

    if (!$error) {
        header( "Location: index.php");
    }
    else {
        echo $error;
    }
  }
}

}
?>
