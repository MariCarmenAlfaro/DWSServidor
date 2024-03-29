
<?php

require_once("../AccesoDatos/usuarioAccesoDatos.php");


function test_alta_usuario()
{
    $u = new UsuarioAccesoDatos();
    
    return $u->insertar('Mari','jugador','1234');
}
function test_alta_usuario2()
{
    $u = new UsuarioAccesoDatos();
    
    return $u->insertar('Mari2','jugador','123456789');
}
function test_alta_usuario_admin()
{
    $u = new UsuarioAccesoDatos();
    return $u->insertar('Marta','administrador','1234');
}
function test_verificar_usuario_encontrado()
{
    $perfil_esperado = 'jugador';
    $u = new UsuarioAccesoDatos();
    $perfil = $u->verificar('mari','1234');
    return $perfil === $perfil_esperado;
}
function test_listadoTorneos(){
    $u = new TorneosReglasNegocio();
    return $u->obtenerDatosListaTorneo();
    
}

var_dump(test_alta_usuario());
var_dump(test_verificar_usuario_encontrado());
var_dump(test_alta_usuario_admin());
var_dump(test_alta_usuario2());
