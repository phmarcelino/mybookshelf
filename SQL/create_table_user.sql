create database bookshelf;

use bookshelf;

create table user
(
id tinyint(2) primary key not null,
user varchar(20),
email varchar(50) unique,
user_pass varchar(30)
);

insert into user values (1, 'Pedro Marcelino', 'P3dro.h@hotmail.com', 'pedrodoido8');
insert into user values (2, 'Pedro Marcelino', 'P3dro.m03@hotmail.com', 'pedrodoido8');