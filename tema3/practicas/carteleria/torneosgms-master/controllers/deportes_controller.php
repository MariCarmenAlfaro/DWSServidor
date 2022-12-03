<?php
//Llamada al modelo
require_once("models/deportes_model.php");


class deportes_controller {

  /**
   * Muestra pantalla 'add'
   * @return No
   */
  function add() {
    require_once("views/deportes_add.phtml");
  }


/**
 * Mostra llistat
 * @return No
 */
  function view() {
    $deporte=new deportes_model();

    //Uso metodo del modelo de deportes
    $datos=$deporte->get_deportes();

    //Llamado a la vista: mostrar la pantalla
    require_once("views/deportes_view.phtml");
  }


/**
 * Inserta a la taula
 * @return No
 */
  function insert() {
      $deporte = new deportes_model();

      if (isset($_POST['insert'])) {
          $deporte->setDeporte ($_POST['nombre']);
          

          $error = $deporte->insertar();

          if (!$error) {
              header( "Location: index.php?controller=deportes&action=view");
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
      $deporte=new deportes_model();

      $id = $_GET['id'];

      $error = $deporte->delete($id);

      if (!$error) {
        header( "Location: index.php?controller=deportes&action=view");
      }
      else {
          echo $error;
      }
    }
  }


/**
 * Mostra els cotxes ordenats per marca
 * @return No
 */
  function ordPuntosDesc() {
    $deporte=new deportes_model();

    //Uso metodo del modelo de deportes
    $datos=$deporte->ordPuntosDesc();

    //Llamado a la vista: mostrar la pantalla
    require_once("views/deportes_view.phtml");
  }

}
?>
