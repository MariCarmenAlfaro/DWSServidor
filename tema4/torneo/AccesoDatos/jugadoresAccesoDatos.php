<?php
ini_set("display_errors", "On");
ini_set("html_errors", 0);
class JugadoresAccesoDatos
{

	function __construct()
	{
	}
	function obtenerDatosJugadores()
	{

		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, "SELECT * FROM T_JUGADORES");
		$consulta->execute();
		$result = $consulta->get_result();

		$jugadores =  array();

		while ($myrow = $result->fetch_assoc()) {
			array_push($jugadores, $myrow);
		}
		return $jugadores;
	}
	function obtenerDatosJugadorFicha($id)
	{

		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, "SELECT * FROM T_JUGADORES  where id=".$id.";");
	
		$consulta->execute();
		$result = $consulta->get_result();
			

		return $result;
	}
}