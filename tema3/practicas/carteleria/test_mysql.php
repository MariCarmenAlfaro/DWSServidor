<?php
$conexion=mysqli_connect('localhost','root','12345');
mysqli_select_db($conexion,'carteleria');
$consulta="SELECT *FROM T_Peliculas";
$resultado=mysqli_query($conexion,$consulta);
if(!$resultado){
    $mensaje='Consulta invalida: '.mysqli_error($conexion). "\n";
    $mensaje .='Consulta realizada: '. $consulta;
    die($mensaje);
}
else
{
    echo "Conexion OK"."<br>";

    while($registro =mysqli_fetch_assoc($resultado) )
    {
        echo $registro['titulo']."<br>";
    }
}
  