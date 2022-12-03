<?php

//Connectar a una Base de dates
$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "bd13";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}



//ELIMINAR

$id = $_GET['id'];


$sql = "DELETE FROM tb_libros WHERE  id= $id ";
if ($conn->query($sql) === TRUE) {
    header('location: pantalla_listado.php');
} else {
    echo "<br>Error:" . $conn->error;
}

 ?>
