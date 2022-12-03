<html>
<body>


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



  // hacemos un select para mostrar los datos de este produto a través de su id

  $id = $_GET['id'];

  $sql = "SELECT * FROM tb_libros WHERE  id= $id ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    //Bucle while para ir recorriendo la base de datos y obtener/ver los datos
    while ($row = $result->fetch_assoc()) {

      $ObAutor = $row['autor'];
      $ObGenero = $row['genero'];
      $ObTitulo = $row['titulo'];
      $ObPrecio = $row['precio'];

    }
  }

  ?>

  <form action ="controlador_editar.php?id='  <?php echo $id ?>'" method="POST">


    <?php

    //Aqui como componente es un desplegable, vamos mirando que opción esta marcada
    //para poner un genero o otro en el Formulario

    if (  $ObGenero == "infantil") {
      ?>

      Genero:
      <select name="genero" >
        <option value="infantil" selected="selected" > infantil </option>
        <option value="ficcion">ficcion</option>
        <option value="ensayo">ensayo</option>
      </select><br>

      <?php
    }elseif ($ObGenero == "ficcion")  {
      ?>

      Genero:
      <select name="genero" >
        <option value="infantil" > infantil </option>
        <option value="ficcion" selected="selected" >ficcion</option>
        <option value="ensayo">ensayo</option>
      </select><br>

      <?php
    }elseif ($ObGenero == "ensayo")  {
      ?>
      Genero:
      <select name="genero" >
        <option value="infantil" > infantil </option>
        <option value="ficcion">ficcion</option>
        <option value="ensayo"  selected="selected" >ensayo</option>
      </select><br>

 <?php
    } //Aqui obtenemos el resto de valores como modelo y precio
  ?>

    Titulo: <input type="text" value="<?php echo $ObTitulo ?> "   name="titulo"><br>
    Autor: <input type="text" value="<?php echo $ObAutor ?> "   name="autor"><br>

    Precio: <input type="text" value="<?php echo $ObPrecio ?> " name="precio"><br>
    <br><br>

    <input type="submit" name="Guardar" value="Guardar">
    <input type="button" onClick="document.location = 'pantalla_listado.php'" name="Cancelar" value="Cancelar">

  </form>

</body>
</html>
