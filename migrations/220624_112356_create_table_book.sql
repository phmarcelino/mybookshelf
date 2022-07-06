create table book
(
id_book tinyint(2) primary key not null auto_increment,
id_user tinyint(2),
title VARCHAR(80) not null,
author varchar(100) not null,
pages int,
genre varchar(40),
publi varchar(15),
cape varchar(100),
company varchar(50),
description varchar(1000),

foreign key (id_user) references user (id)
);
