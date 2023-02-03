drop database if exists tenis_mesa;
create database tenis_mesa;
use tenis_mesa;
create table T_TORNEOS(
id int auto_increment primary key,
nombreTorneo varchar(100) not null,
numeroJugadores int default 8,
fecha date not null
);

create table T_JUGADORES(
id int auto_increment primary key,
nombreJugador varchar(100)

);

create table T_PARTIDOS(
id int auto_increment primary key,
idTorneo int,
tipoPartido enum('Cuartos', 'Semifinal','Final'),
idJugador1 int not null,
idJugador2 int not null,
ganador int,
foreign key(idTorneo) references T_TORNEOS(id)
on delete cascade,
foreign key(idJugador1) references T_JUGADORES(id)
on delete cascade,
foreign key(idJugador2) references T_JUGADORES(id)
on delete cascade
);
create table T_USUARIOS(
id int auto_increment,
usuario varchar(100),
clave varchar(100),
perfil varchar(100),
primary key(id,usuario)
);
insert into T_TORNEOS(nombreTorneo,fecha) values ("Torneo Navidad","2022-12-22"),
("Torneo Fin de curso","2023-06-23");
insert into T_JUGADORES(nombreJugador) values ("Mari Alfaro"),
("Alejandro Cano"),("Adrian Guinot"),("Sergio Diaz"),("Jaume Aguilo "),("Clara Ruiz"),("Marga Moya"),("Nerea Navarro");

insert into T_PARTIDOS(idTorneo,tipoPartido,idJugador1,idJugador2,ganador) 
values (1, "Cuartos", 1,2,1);

insert into T_PARTIDOS(idTorneo,tipoPartido,idJugador1,idJugador2,ganador) 
values (1, "Semifinal", 1,3,1);
insert into T_PARTIDOS(idTorneo,tipoPartido,idJugador1,idJugador2,ganador) 
values (1, "Final", 1,5,null);