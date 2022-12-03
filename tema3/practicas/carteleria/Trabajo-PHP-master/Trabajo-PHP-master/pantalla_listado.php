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

//Botón para cerrar sesión posicionado arriba en el centro
?>
<div ALIGN=center>
  <input type="button" onClick="document.location = 'controlador_logout.php'" name="cerrar_sesion" value="Logout"> <br><br>
</div>
<?php



//Información sobre que usuario a iniciado sesión posicionado a la derecha
?><div ALIGN=right><?php
session_start();
echo("Hola, ".$_SESSION['usuario']);

?></div><?php

//Consulta de los componentes

$sql = "SELECT * FROM tb_libros";
$result = $conn->query($sql);




//Imprimir tabla
if ($result->num_rows > 0) {



  //Creación de la tabla
  echo "<table>";
    echo "<tr>
            <th> <a href=pantalla_listado_ordenado.php>Titulo</th>
            <th> Autor</th>
            <th> Genero</th>
            <th>Precio </th>
          <tr>";

  //Bucle que va haciendo las consultas
  while($row = $result->fetch_assoc()) {


    echo
    "<tr>
    <td>  $row[titulo] </td> ";

    echo "
    <td>  $row[autor] </td> ";

    echo "
    <td>  $row[genero] </td>";
    echo "
    <td>  $row[precio] € </td>";

    echo "
    <td> <a href=edicion.php?id=".$row["id"]."> Editar </a> </td> "; //Botón para Editar los datos

    echo "
    <td> <a href=controlador_baja.php?id=".$row["id"]."> Borrar </a> </td> "; //Botón para Borrar los datos


    echo"  </tr>";




  }
  echo "</table>";

} else {
  echo "<table>";
    echo "<tr>
            <th> Titulo</th>
            <th> Autor</th>
            <th> Genero</th>
            <th>Precio </th>
         <tr>";
  echo "<table>";
}
?>

<br>
<!-- Botón para crear un alta  -->
<input type="button" onClick="document.location = 'altas.php'" name="Nuevo" value="Nuevo">

<br><br>





<?php
?>
