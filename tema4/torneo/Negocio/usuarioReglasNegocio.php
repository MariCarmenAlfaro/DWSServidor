<?php

require("../AccesoDatos/usuarioAccesoDatos.php");

class UsuarioReglasNegocio
{

	function __construct()
    {
    }
    function verificar($usuario, $clave)
    {
       if(strlen($clave)<8){
           
        echo '<script language="javascript">alert("¡Ojo! Tu contraseña debe tener mínimo 8 carácteres.");</script>';
        }
        $usuariosDAL = new UsuarioAccesoDatos();
        $res = $usuariosDAL->verificar($usuario,$clave);
        
        return $res;
        
    }
 
}

