<?php

//Inicia sesion para poder usar session
session_start();

require_once("db/db.php");

require_once("controllers/torneos_controller.php");
require_once("controllers/deportes_controller.php");
require_once("controllers/comentarios_controller.php");
require_once("controllers/jugadores_controller.php");
require_once("controllers/equipos_controller.php");
require_once("controllers/usuarios_controller.php");

if (isset($_GET['controller']) && isset($_GET['action']) ) {

    if ($_GET['controller'] == "torneos") {

      //Muestra los torneos (en este caso la pantalla principal por que solo hay un torneo)
         if ($_GET['action'] == "view") {
           $controller = new torneos_controller();
           $controller->view();
         }

         //Pantalla para insetar un torneo
         if ($_GET['action'] == "add") {
           $controller = new torneos_controller();
           $controller->add();
         }

         //insetra un torneo
         if ($_GET['action'] == "insert") {
           $controller = new torneos_controller();
           $controller->insert();
         }

         //Elimina un torneo
         if ($_GET['action'] == "delete") {
           $controller = new torneos_controller();
           $controller->delete();
         }

    }

    if ($_GET['controller'] == "home") {

      if ($_GET['action'] == "view") {
        $controller = new home_controller();
        $controller->view();
      }
    }

    //Controlador de deportes 
    if ($_GET['controller'] == "deportes") {

      //Muestra los deportes
      if ($_GET['action'] == "view") {
        $controller = new deportes_controller();
        $controller->view();
      }

      //Muestra la pantalla para insertar un deporte
      if ($_GET['action'] == "add") {
        $controller = new deportes_controller();
        $controller->add();
      }

      //Inserta un deporte
      if ($_GET['action'] == "insert") {
        $controller = new deportes_controller();
        $controller->insert();
      }

      //Elimina un deporte
      if ($_GET['action'] == "delete") {
        $controller = new deportes_controller();
        $controller->delete();
      }

   

    }

    //Controlador de comentarios
    if ($_GET['controller'] == "comentarios") {

      //Muestra la pantalla de directo
      if ($_GET['action'] == "view") {
        $controller = new comentarios_controller();
        $controller->view();
      }

      //Va a la pantalla para insertar comentarios
      if ($_GET['action'] == "add") {
        $controller = new comentarios_controller();
        $controller->add();
      }

      //Inserta un comentario
      if ($_GET['action'] == "insert") {
        $controller = new comentarios_controller();
        $controller->insert();
      }

      //Elimina un comentario
      if ($_GET['action'] == "delete") {
        $controller = new comentarios_controller();
        $controller->delete();
      }

      //Borra todos los comentarios de un partido
      if ($_GET['action'] == "finalizarPartido") {
        $controller = new comentarios_controller();
        $controller->finalizarPartido();
      }

      
    //action para ver los equipos en el directo
    if ($_GET['action'] == "equiposView") {
      $controller = new comentarios_controller();
      $controller->equiposView();
    }

    //Crea un partido en el directo
    if ($_GET['action'] == "crearPartido") {
      $controller = new comentarios_controller();
      $controller->crearPartido();
    }

    //Muestra los equipos por partido
    if ($_GET['action'] == "verEquiposXPartido") {
      $controller = new comentarios_controller();
      $controller->verEquiposXPartido();
    }

    //Inserta los goles en el partido
    if ($_GET['action'] == "insertarGoles") {
      $controller = new comentarios_controller();
      $controller->insertarGoles();
    }

    }

  //Controlador de jugadores
    if ($_GET['controller'] == "jugadores") {

      //Muestra todos los jugadores
      if ($_GET['action'] == "view") {
        $controller = new jugadores_controller();
        $controller->view();
      }

      //Manda a la ventana de insertar jugador
      if ($_GET['action'] == "add") {
        $controller = new jugadores_controller();
        $controller->add();
      }

      //Inserta un jugador
      if ($_GET['action'] == "insert") {
        $controller = new jugadores_controller();
        $controller->insert();
      }

      //Elimina un jugador
      if ($_GET['action'] == "delete") {
        $controller = new jugadores_controller();
        $controller->delete();
      }

        //action para ver los equipos y poderlo asignar a un jugador
    if ($_GET['action'] == "equiposView") {
      $controller = new jugadores_controller();
      $controller->equiposView();
    }

    }

    //Controlador de equipos
    if ($_GET['controller'] == "equipos") {

      //Muestra todos los equipos
      if ($_GET['action'] == "view") {
        $controller = new equipos_controller();
        $controller->view();
      }

      //Muestra la pantalla para añadir un equipo
      if ($_GET['action'] == "add") {
        $controller = new equipos_controller();
        $controller->add();
      }

      //Inserta un equipo
      if ($_GET['action'] == "insert") {
        $controller = new equipos_controller();
        $controller->insert();
      }

      //Elimina un equipo
      if ($_GET['action'] == "delete") {
        $controller = new equipos_controller();
        $controller->delete();
      }

     //Ordena los equipos por puntos descendientemente
      if ($_GET['action'] == "ordPuntosDesc") {
        $controller = new equipos_controller();
        $controller->ordPuntosDesc();
      }

      //Ordena los equipos por puntos ascendientemente
      if ($_GET['action'] == "ordPuntosAsc") {
        $controller = new equipos_controller();
        $controller->ordPuntosAsc();
      }

      //Ordena los equipos por nombre ascendientemente
      if ($_GET['action'] == "ordNombreAsc") {
        $controller = new equipos_controller();
        $controller->ordNombreAsc();
      }

      //Ordena los equipos por nombre descendientemente
      if ($_GET['action'] == "ordNombreDesc") {
        $controller = new equipos_controller();
        $controller->ordNombreDesc();
      }

    }

    // Conroller de usuarios
  if ($_GET['controller'] == "usuarios") {

    //action para añadir usuarios
    if ($_GET['action'] == "registroView") {
      $controller = new usuarios_controller();
      $controller->registroView();
    }

    //action para hacer login de usuarios
    if ($_GET['action'] == "loginView") {
      $controller = new usuarios_controller();
      $controller->loginView();
    }

    //Action para insertar usuarios
    if ($_GET['action'] == "insert") {
      $controller = new usuarios_controller();
      $controller->insert();
    }

    //Action para hacer login
    if ($_GET['action'] == "login") {
      $controller = new usuarios_controller();
      $controller->login();
    }

    //Action para hacer logout
    if ($_GET['action'] == "logout") {
      $controller = new usuarios_controller();
      $controller->logout();
    }


  
}


} else {

  //Muestra la pantalla principal
    $controller = new torneos_controller();
    $controller->view();
}
?>
