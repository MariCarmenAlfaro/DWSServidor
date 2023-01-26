<?php

require ("../Negocio/usuarioReglasNegocio.php");

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $usuarioBL = new UsuarioReglasNegocio();
    $perfil =  $usuarioBL->verificar($_POST['usuario'],$_POST['clave']);

    if ($perfil==="administrador" )
    {
        session_start(); //inicia o reinicia una sesión
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: torneosVista.php");
    }elseif($perfil==="jugador"){
        session_start(); 
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: torneoVistaJugador.php");
    }
    else
    {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="../css/estiloFinal.css">
</head>
<body>
<h1>Accesso de los usuarios</h1>
<div class="contenedorLogin">
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label class="datosLogin" for = "usuario"> Usuario: </label>
        <input class="inputLogin" id="usuario" name = "usuario" type = "text">
        <label class="datosLogin" for = "usuario"> Contraseña: </label>
        <input class="inputLogin" id = "clave" name = "clave" type = "password">
        <input type = "submit">
    </form>
</div>
    <?php
        if (isset($error))
        {
            print("<div> No tienes acceso </div>");
        }
    ?>
</body>
</html>