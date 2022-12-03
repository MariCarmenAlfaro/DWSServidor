

<!DOCTYPE html>

<html lang="es">

<head>
  <title>Clasificación</title>
    <?php 
        //Inicia sesion para poder usar session
        session_start();
        include 'views/head_view.html';
      ?>
</head>

<body>

  <?php include 'views/menu_view.phtml';?>


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



  // hacemos un select para mostrar los datos de este produto a través de su id

  $id = $_GET['id'];

  $sql = "SELECT * FROM `equipos` where id_equipo = $id ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    //Bucle while para ir recorriendo la base de datos y obtener/ver los datos
    while ($row = $result->fetch_assoc()) {

    
      $ObPrecio = $row['puntos'];

    }
  }

  ?>
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h3 class="mt-3 mb-4">Actualización de puntos</h3>
        <form action ="controlador_editar.php?id='  <?php echo $id ?>'" method="POST">



          Puntos: <input type="number" value=<?php echo $ObPrecio ?>  name="puntos"><br>
          <br>

          <input type="submit" name="Guardar" value="Guardar">
          <input type="button" onClick="document.location = 'index.php?controller=equipos&action=view'" name="Cancelar" value="Cancelar">

        </form>
      </div>
    </div>
  </div>
</body>
</html>
