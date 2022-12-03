

<?php

session_start();

//SI el usuario esta vació te manda a la pantalla de loguin
if (isset($_SESSION['usuario'])) {

//SI el usuario es cliente te manda al listado con los ajustes de cliente
  if ($_SESSION['usuario'] == "cliente") {

    include 'pantalla_listado_cliente.php' ;

//SI el usuario es admin te manda al listado con los ajustes de admin
  }else {
    header('location: pantalla_listado.php');

  }

}else {
  include 'pantalla_login.php' ;

}
 ?>
