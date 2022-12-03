<?php


//Connectar a una Base de datos

$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "bd13";

$conn =  new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){

  die("connection failed: " . $conn->connect_error);

}

session_start();

$login = false;

$usuario = $_POST["usuario"];
$password =  $_POST["password"];

$sql = "SELECT * FROM tb_usuarios";
$result = $conn->query($sql);

echo "<br>";

if($result->num_rows > 0){

  while($row = $result->fetch_assoc()){

    if($usuario == $row["usuario"] && $password == $row["password"]){

      $login = true;

      $_SESSION["usuario"] = $usuario;

      break;

    }

  }

}

  if($login == true){

    header('location: index.php');

  } else {

    header('location: pantalla_login_error.php');

  }

?>
