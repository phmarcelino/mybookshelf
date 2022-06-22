create table book
(
id_book tinyint(2) primary key not null auto_increment,
id_user tinyint(2),
title varchar(80) not null,
author varchar(100) not null,
pages int,
genre varchar(40),
publi varchar(15),
cape varchar(100),
company varchar(50),
description varchar(1000),

foreign key (id_user) references user (id)
);
select * from book;
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', 'Mentirosos', 'E.Lockhart', '256', 'Romance,FicÃ§Ã£o,Distopia,Literatura', 'NÃ£o-Nacional', '../img/62b0c6584dea8.jpg', 'Seguinte', 'Qualquer DescriÃ§Ã£o');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');
insert into book (id_user, title, author, pages, genre, publi, cape, company, description) values ('1', '1984', 'George Orwell', 416, 'AÃ§Ã£o,FicÃ§Ã£o', 'Nacional', '../img/62b0c64746448.jpg', 'Companhia das Letras', 'Livro de George Orwell, romance que retrata uma distopia de 1984.');

