drop database if exists tenis_mesa;
create database tenis_mesa;
use tenis_mesa;
create table T_TORNEOS(
id int auto_increment primary key,
nombreTorneo varchar(100) not null,
numeroJugadores int not null,
fecha date not null
);
create table T_JUGADORES(
id int auto_increment primary key,
nombreJugador varchar(100),
totalPartidos int,
partidosGanados int,
porcentajeVictorias int,
partidosJugados int,
torneosGanados int
);
create table T_PARTIDOS(
id int auto_increment primary key,
idTorneo int,
tipoPartido enum('Cuartos', 'Semifinal','Final','Campeón'),
nombrePartido varchar(100),
idJugador1 int,
idJugador2 int,
ganador int,

foreign key(idTorneo) references T_TORNEOS(id),
foreign key(idJugador1) references T_JUGADORES(id),
foreign key(idJugador2) references T_JUGADORES(id),
foreign key(ganador) references T_JUGADORES(id)

);
create table T_USUARIOS(
id int auto_increment primary key,
nombreUsuario varchar(100),
contrasenya varchar(100)
);