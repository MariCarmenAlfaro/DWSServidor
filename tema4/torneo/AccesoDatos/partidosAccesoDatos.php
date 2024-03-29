<?php
ini_set("display_errors", "On");
ini_set("html_errors", 0);
require_once('torneoAccesoDatos.php');

class PartidosAccesoDatos
{

	function __construct()
	{
	}
		
	function crearPartido($jugadorA,$jugadorB, $ronda, $idTorneo){
		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');

		
		$consulta = mysqli_prepare($conexion, "insert into T_PARTIDOS(idTorneo,tipoPartido,idJugador1,idJugador2) values ('$idTorneo','$ronda','$jugadorA','$jugadorB');");
		
		$consulta->execute();
	}

	function modificarPartido($id, $ganador){
		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');

		$consulta = mysqli_prepare($conexion, "update t_partidos set ganador=".$ganador." where id=".$id.";");

		$consulta->execute();
	}

	function obtenerDatosListaPartido($idTorneo)
	{

		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, "SELECT * FROM T_PARTIDOS where idTorneo=".$idTorneo."");
		$consulta->execute();
		$result = $consulta->get_result();

		
		$partidos =  array();

		while ($myrow = $result->fetch_assoc()) {
			array_push($partidos, $myrow);
		}
		
		return $partidos;
	}
}