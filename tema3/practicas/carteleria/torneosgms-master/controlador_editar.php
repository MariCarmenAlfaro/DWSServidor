<?php

//Connectar a una Base de datos


$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "torneosgms";

// Crea la conexión

$conn = new mysqli($servername, $username, $password, $dbname);


// Chequea la conexión

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}

//Limpiador para SQL Injection y campos vacios
function limpia($limpiador){

$limpiador = trim($limpiador);
$limpiador  = stripcslashes($limpiador);
$limpiador  =htmlspecialchars($limpiador);
return $limpiador;
}


$puntos =limpia($_POST["puntos"]) ;


//Comprueba si algun campo esta en blanco, en caso de que lo este, te manda a la pantalla editar
if( empty($_POST['puntos'])  ){
  header( "Location: index.php?controller=equipos&action=view");
}else {

$id = $_GET["id"];

//MODIFICAR
$sql = "UPDATE equipos SET  puntos = '$puntos' where id_equipo = $id";
if ($conn->query($sql) === TRUE) {

  header( "Location: index.php?controller=equipos&action=view");

} else {
    echo "<br>Error:" . $conn->error;
}
}

 ?>
