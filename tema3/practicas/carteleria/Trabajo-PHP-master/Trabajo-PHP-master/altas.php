<?php

//Formulario para introducir los nuevos componentes
?>

<form action="controlador.php" method="post">

  Genero:
  <select name="genero" >
    <option value="infantil">infantil</option>
    <option value="ficcion">ficcion</option>
    <option value="ensayo">ensayo</option>

  </select><br>

  Titulo: <input type="text"   name="titulo"><br>
  Autor: <input type="text"   name="autor"><br>
  Precio: <input type="number"   name="precio"><br>
  <br><br>

  <input type="submit" name="Guardar" value="Guardar"> 
  <input type="button" onClick="document.location = 'pantalla_listado.php'" name="Cancelar" value="Cancelar">

</form>
