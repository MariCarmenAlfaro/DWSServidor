<?php
ini_set("display_errors", "On");
ini_set("html_errors", 0);
class TorneosAccesoDatos
{

	function __construct()
	{
	}

	function obtenerDatosListaTorneo()
	{

		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, "SELECT * FROM T_TORNEOS");
		$consulta->execute();
		$result = $consulta->get_result();

		$torneos =  array();

		while ($myrow = $result->fetch_assoc()) {
			array_push($torneos, $myrow);
		}
		return $torneos;
	}

	function insertarNuevosTorneos($nombreTorneo,$fechaTorneo)
	{
		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, 
		"insert into T_TORNEOS (nombreTorneo, fecha) values ('$nombreTorneo','$fechaTorneo')");
		$consulta->execute();
	}
	function obtenerIdUtlimoTorneo()
	{
		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, 
		"select id from T_TORNEOS order by id desc limit 1;");
		$consulta->execute();
		$a = $consulta->get_result();

		$id;

		foreach($a as $k){
			$id = $k['id'];
		}

		return $id;
	}

	function eliminarTorneo($id){
		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, 
		"DELETE from T_TORNEOS where id=".$id."");
		$consulta->execute();
	}
	}

