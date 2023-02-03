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
		$consulta = mysqli_prepare($conexion, "SELECT * FROM T_JUGADORES;");
		$consulta->execute();
		$result = $consulta->get_result();

		$jugadores =  array();

		while ($myrow = $result->fetch_assoc()) {
			array_push($jugadores, $myrow);
		}
		return $jugadores;
	}
	function obtenerJugadoresDePartidos($idTorneo, $tipoPartido){
		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$query = "SELECT 
		jugador1.nombreJugador as jugador1, jugador2.nombreJugador as jugador2,
		ganador.nombreJugador as ganador
	 FROM
		 t_partidos 
			 inner JOIN
		 T_JUGADORES as jugador1 ON t_partidos.idJugador1 = jugador1.id
		 inner join 
		  T_JUGADORES as jugador2 ON t_partidos.idJugador2 = jugador2.id
		  INNER JOIN
    T_JUGADORES AS ganador ON t_partidos.ganador = ganador.id
	 WHERE
		 t_partidos.idTorneo = ".$idTorneo."
			 AND t_partidos.tipoPartido ='".$tipoPartido."'; ";


		$consulta = mysqli_prepare($conexion, $query);
		$consulta->execute();
		$result = $consulta->get_result();

		$jugadores =  array();

		while ($myrow = $result->fetch_assoc()) {
			array_push($jugadores, $myrow);
		}
		return $jugadores;
	}
	function obtenerDatosJugadorFicha($idTorneo, $tipoPartido)
	{

		$conexion = mysqli_connect('localhost', 'root', '1234');
		if (mysqli_connect_errno()) {
			echo "Error al conectar a MySQL: " . mysqli_connect_error();
		}
		mysqli_select_db($conexion, 'tenis_mesa');
		$consulta = mysqli_prepare($conexion, "select * from T_JUGADORES inner join T_PARTIDOS on t_jugadores.id=t_partidos.id where t_partidos.idTorneo=".$idTorneo." AND t_partidos\.tipoPartido=".$tipoPartido.";");
	
		$consulta->execute();
		$result = $consulta->get_result();
			

		return $result;
	}
}