<?php

//Connectar a una Base de datos

$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "bd13";

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

$autor=limpia( $_POST["autor"]);
$genero =limpia($_POST["genero"]) ;
$titulo =limpia($_POST["titulo"]);
$precio =limpia($_POST["precio"]) ;

//Comprueba si algun campo esta en blanco, en caso de que lo este, te manda a la pantalla editar
if(empty($_POST['autor']) || empty($_POST['genero']) || empty($_POST['titulo']) || empty($_POST['precio'])  ){
  header('location: pantalla_listado.php');
}else {

$id = $_GET["id"];

//MODIFICAR
$sql = "UPDATE tb_libros SET titulo = '$titulo', autor = '$autor', genero = '$genero', precio = '$precio' where id = $id";
if ($conn->query($sql) === TRUE) {

  header('location: pantalla_listado.php');

} else {
    echo "<br>Error:" . $conn->error;
}
}

 ?>
