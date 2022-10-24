create schema pokemon;
use pokemon;
create table usuario (idUsuario int not null primary key auto_increment, nombreUsuario varchar(40), usuario varchar (40), clave varchar(10));
insert into usuario(nombreUsuario, usuario, clave) 
values("Daniel Guio", "daniel.guio16@gmail.com","1234usuario"),
("userprueba","userprueba","0000");
