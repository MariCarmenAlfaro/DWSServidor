<?php
//Llamada al modelo
require_once("models/home_model.php");


class home_controller {

/**
 * Muestra pantalla 'add'
 * @return No
 */
function add() {
  require_once("views/home_add.phtml");
}


/**
 * Mostra llistat
 * @return No
 */
function view() {
  $torneo=new home_model();

  //Uso metodo del modelo de home
  $datos=$torneo->get_home();

  //Llamado a la vista: mostrar la pantalla
  require_once("views/home_view.phtml");
}



?>
