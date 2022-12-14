drop database if exists carteleria;
create database if not exists carteleria;

use carteleria;

drop table if exists T_CATEGORIA;
create table T_CATEGORIA(
id int primary key,
genero varchar(50)not null,
estilo varchar(50)not null);

select * from T_CATEGORIA;
insert into T_CATEGORIA (id, genero, estilo) values(1,"Infantil","estilos_barbie.css");
insert into T_CATEGORIA (id, genero, estilo) values(2,"Terror","estilos_terror.css");

drop table if exists T_DIRECCION;
create table T_DIRECCION(
idDireccion int primary key auto_increment,
nombreDireccion varchar(20));

drop table if exists T_REPARTO;
create table T_REPARTO(
idReparto int primary key auto_increment,
nombreReparto varchar(20));
drop table if exists T_PELICULA;
create table T_PELICULA(
id int primary key,
titulo varchar(200) not null,
año int default null,
duracion int not null,
sinopsis varchar(500) default null,
imagen varchar(100) default null,
votos int default 0,
id_categoria int default null ,
foreign key (id_categoria) references T_CATEGORIA(id));

drop table if exists T_DIRECCION_PELICULA;
create table T_DIRECCION_PELICULA(
id_direccion int,
id_peli int,
primary key(id_direccion,id_peli),
foreign key (id_direccion) references T_DIRECCION(idDireccion),
foreign key (id_peli) references T_PELICULA(id))
;
drop table if exists T_REPARTO_PELICULA;
create table T_REPARTO_PELICULA(
id_reparto int,
id_peli int,
primary key(id_reparto,id_peli),
foreign key (id_reparto) references T_REPARTO(idReparto),
foreign key (id_peli) references T_PELICULA(id))
;



insert into T_PELICULA (id, titulo, año, duracion, sinopsis, imagen, id_categoria) 
values(1,"El Resplandor",1980, 144,"Jack Torrance es un hombre que se muda con su familia a un hotel aislado que debe cuidar, con la esperanza de salir del bloqueo creativo de su escritura. Mientras Jack no puede escapar del bloqueo, las visiones psíquicas de su hijo van en aumento.","imgs/terror/resplandor.webp",2),
(2,"Hallowen",1978, 91,"El pequeño Michael Myers asesina a su hermana en la noche de Halloween de 1963, por lo que es internado en un psiquiátrico. Años más tarde, se escapa del hospital y regresa a su pueblo natal. El psicópata dará comienzo a una serie de horripilantes asesinatos mientras uno de los médicos que lo trataba en el hospital le sigue la pista.","imgs/terror/halloween.jpg",2),
(3,"La Matanza de Texas",1974, 83, "Un grupo de jóvenes se pierde en medio de las desérticas carreteras de Texas, y termina encontrándose con una familia de matarifes que los persigue con una sierra mecánica, descuartizándolos uno por uno.","imgs/terror/matanzaTexas.jpg",2),
(4,"Scream. Vigila quién llama",1996,114, "25 años después de que una racha de asesinatos brutales conmocionara a la tranquila ciudad de Woodsboro, un nuevo asesino imitador se ha puesto la máscara de Ghostface para resucitar secretos del pasado.","imgs/terror/scream.jpg",2),
(5,"Terrifier",2016,82,"El payaso psicópata Art aterroriza a dos chicas durante la noche de Halloween, matando a todos aquellos que se interponen en su camino.","imgs/terror/terrifier.jpg",2),
(6,"Posesión infernal",2013,91,"Cinco amigos se alojan en una cabaña de Tenessee para así poder ayudar a una de los jóvenes, que se encuentra en rehabilitación por drogas. Estar sin sus drogas convierte a la chica en una persona agresiva, lo que llevará a sus amigos a no darse cuenta de que en realidad esta poseída por demonios.","imgs/terror/posesionInfernal.jpg",2),
(7,"The taking of Deborah Logan",2014,90,"Ubicado en Virginia, habla la historia de un equipo de grabación que hace una película sobre los pacientes de alzheimer hasta que descubren algo siniestro mientras documentan a una mujer que tiene la enfermedad.","imgs/terror/takingDeborah.jpg",2),
(8,"Aterrados",2017,87,"Fuerzas paranormales invadieron su barrio en Buenos Aires, y para llegar al fondo del asunto, se enfrentarán a sus peores miedos.","imgs/terror/aterrados.jpg",2),
(9,"La Posesión",1981,127,"Cuando Marc regresa de un viaje encuentra a su esposa Anna cambiada, muy nerviosa y perturbada.Confiesa que tiene una aventura y lo abandona. Marc cae en una terrible depresión que lo lleva casi al borde de la locura.Su mujer también ha abandonado a su amante, y la verdad sobre la aventura secreta de Anna se revelará monstruosa.
","imgs/terror/laPosesion.jpg",2)
,(10,"Expediente Warren: The Conjuring",2013,112,"Narra los encuentros sobrenaturales que vivió la familia Perron en su casa de Rhode Island a principios de los 70. Ed y Lorraine Warren, investigadores de renombre en el mundo de los fenómenos paranormales, acuden a la llamada de una familia aterrorizada por la presencia en su granja de un ser maligno.","imgs/terror/expedienteWarren.jpg",2)
;


insert into T_PELICULA (id, titulo, año, duracion, sinopsis, imagen,id_categoria) 
values(11,"Barbie en el lago de los cisnes.",2003,81,"Barbie cobra vida en esta su tercera aventura. Un unicornio llamada Lila llega a la aldea de Odette, logra escapar de los cazadores y corre hacia un bosque encantado con la chica pisandole los talones. Allí se encuentra atrapada y transformada en cisne por el malvado Rothbart.","imgs/barbie/lagoCisnes.jpg",1),
(12,"Barbie como la princesa y la costurera",2004,85,"La película nos presenta a Erika y Annelise, 2 chicas de distintas sociedades como dice selena pero idénticas físicamente que deciden intercambiar vidas mientras lidian con sus problemas de amor y presión social.","imgs/barbie/costurera.jpg",1),
(13,"Barbie en las 12 princesas bailarinas",2006,81,"La Princesa Genevieve y sus 11 hermanas descubren un mundo mágico. Un día la malvada duquesa se entera de esto y las encierra en él pero por accidente también es encerrada, Ahora Genevieve, la duquesa y sus hermanas tendrán que buscar una manera de salir.","imgs/barbie/12bailarinas.jpg",1),
(14,"Barbie y sus hermanas en una aventura de caballos",2013,95,"Barbie y sus hermanas van al campamento de equitación de su tía en el verano y compiten en un torneo de carreras de caballos. Barbie conoce a Majestic un corcel leal y majestuoso, que se supone que era un cuento de hadas. Barbie y sus hermanas compiten en el torneo para ganar la permanencia del campamento y el hogar de Majestic y su tía.","imgs/barbie/aventuraCaballo.jpg",1),
(15,"Barbie superprincesa",2015,74,"Una princesa muy actual con una vida muy normal. Un día, tras ser besada por una mariposa mágica, Kara descubre que tiene unos increíbles superpoderes que le permiten transformarse en Súper Diamante, su alter ego secreto que combate el crimen y vuela por todo el reino salvando a la gente.","imgs/barbie/superprincesa.jpg",1),
(16,"Barbie Escuela de princesas",2011,81,"Blair, la hermana menor adoptiva, recibe una invitación para asistir a la prestigiosa escuela de princesas para la formación formal como princesa. Ahí se vuelve amiga de Aila, una apasionada a la música y de Hadley una apasionada del fútbol, cuando descubre que Blair es en realidad la princesa Sofía, tendrá que lidiar con Delancy, quien está dispuesta a todo por tomar el trono","imgs/barbie/escuelaPrincesa.jpg",1),
(17,"Barbie y las tres mosqueteras",2009,81,"Corrine, quien tiene el sueño de ser mosquetera como su padre. Al cumplir los dieciocho, Corrine se marcha a París, donde conoce a tres jóvenes, Viveca, Aramina y René, quienes comparten su sueño, Así las 4 deberán unir fuerzas para salvar al Príncipe de un complot llevado en su contra.","imgs/barbie/mosqueteras.jpg",1),
(18,"Barbie Mariposa y sus amigas las hadas",2008,75,"Henna, la malvada hada mariposa ha envenenado a la reina de El País de la Luz en un intento de apoderarse del reino. Debido a esto, las luces de la protección de Flutterfield están en peligro de salir. Estas luces protegen El País de la Luz de los \"Skeezites\", monstruos que comen las hadas mariposa. Depende de Mariposa, Zinzie, Rayna y Rayla para encontrar un antídoto para salvar a la reina.","imgs/barbie/mariposa.jpg",1),
(19,"Barbie y la magia de pegaso",2005,85,"Annika, una joven con padres sobreprotectores que ama patinar. Un día un malvado mago hechiza a su pueblo transformándolo en piedra, pero Annika es salvada por su hermana Brietta, convertida en pegaso. Tras esto, Annika deberá demostrar su valor y romper el hechizo.","imgs/barbie/pegaso.jpg",1),
(20,"Barbie en el cascanueces",2001,78,"Clara recibe un precioso Cascanueces de madera como regalo. Esa noche mientras Clara duerme, el Cascanueces cobra vida para rechazar el ataque del perverso Ratón que ha invadido el cuarto de la joven.","imgs/barbie/cascanueces.jpg",1);

insert into T_DIRECCION (nombreDireccion) values("Stanley Kubrick"),("John Carpenter"),("Tobe Hooper"),("Wes Craven."),("Damien Leone"),(" Federico Alvarez"),("Adam Robitel"),
("Demián Rugna"),("Andrzej Zulawski"),("James Wan."),("Owen Hurley"),("William Lau"),("Greg Richardson."),("Kyran Kelly"),("Ezekiel Norton"),("Conrad Helten");

insert into T_REPARTO (nombreReparto) values("Jack Nicholson"),("Shelley Duvall"),("Danny Lloyd"),("Jamie Lee Curtis"),("Donald Pleasence"),("Nancy Loomis"),("Marilyn Burns"),
("Paul A. Partain"),("Edwin Neal"),("Neve Campbell"),("David Arquette"),("Courteney Cox"),("Jenna Kanell"),("Samantha Scaffidi"),("David Howard "),("Jeny Levy"),("Shiloh Fernandez"),
("Lou Taylor Pucci"),("Jill Larson"),("Anne Ramsay"),("Michelle Ang"),("George Lewis"),("Maximiliano Ghione"),(" Natalia Senorales"),("Isabelle Adjani"),("Sam Neill"),("Margit Carstensen"),
("Vera Farmiga"),("Patrick Wilson"),("Sterling Jerins"),("Nicole Oliver"),("Kelly Sheridan"),("Kathleen Barr"),("Mark Hildreth"),("Alessandro Juliani"),("Christopher Gaze"),("Shawn McDonald"),("Chantal Strand"),
("Kazumi Evans"),("Claire Margaret"),("Rebecca Husain"),("Britt Irvin"),
("Diana Kaarina"),("Morwenna Bancos"),("Nicole Oliver"),("Tim Curry"),("Willow Johnson"),("Maryke Hendrikse");

INSERT INTO T_REPARTO_PELICULA( id_reparto,id_peli) values (1,1),(2,1),(3,1),(4,2),(5,2),(6,2),(7,3),(8,3),(9,3),(10,4),(11,4),(12,4),(13,5),(14,5),(15,5),(16,6),(17,6),(18,6),
(19,7),(20,7),(21,7),(22,8),(23,8),(24,8),(25,9),(26,9),(27,9),(28,10),(29,10),(30,10),(31,11),(32,11),(33,11),(34,12),(35,12),(36,13),(37,13),(38,13),
(39,14),(40,14),(41,15),(42,15),(43,16),(44,16),(45,16),(46,17),(47,17),(48,18),(32,12),(32,14),(32,15),(32,17),(32,18),(32,19),(32,20),(35,18),(47,20),(38,20);

insert into T_DIRECCION_PELICULA(id_direccion,id_peli) values(1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12),
(13,13),(14,14),(15,15),(16,18),(15,16),(12,17),(13,19),(11,20);

select * from T_PELICULA order by titulo ;
select * from T_CATEGORIA;
select * from T_REPARTO;
select * from T_DIRECCION;
select * from T_DIRECCION_PELICULA;
select * from T_REPARTO_PELICULA;