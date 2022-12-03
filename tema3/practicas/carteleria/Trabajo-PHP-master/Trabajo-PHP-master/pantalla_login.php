<html>
  <head>
  </head>
  <body>
    <!-- Pantalla de login donde introducir los datos y mandarlos por post al controlador  -->

    <h1>Iniciar sesion</h1>

    <form action="controlador_login.php" method="post">

      Usuario:  <input type="text" name="usuario"><br><br>
      Password: <input type="password" name="password">

      <br><br>

      <input type="submit" name="submit" value="Enviar">

    </form>
  </body>
</html>
