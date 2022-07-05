create database homework2;

use homework2;

CREATE TABLE users(
    id integer primary key auto_increment,
    nickname varchar(16) not null unique,
    nome varchar(255) not null,
    cognome varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    image varchar(255),
updated_at datetime,
created_at datetime
    
) Engine = InnoDB;


CREATE TABLE posts(
id integer primary key auto_increment,
user_id integer,
nickname varchar(16) not null,
foto varchar(255),
foreign key (user_id) references users(id) on delete cascade on update cascade,
foreign key (nickname) references users(nickname) on delete cascade on update cascade
) Engine=InnoDB;

CREATE TABLE favs(
id integer primary key auto_increment,
user_id integer,
nickname varchar(16) not null,
elemento varchar(255),
foreign key (user_id) references users(id) on delete cascade on update cascade,
foreign key (nickname) references users(nickname) on delete cascade on update cascade
) Engine=InnoDB;
UPDATE users set url='https://images.unsplash.com/photo-1583697360036-63916ef31e71?crop=entropy' where nickname='elecann';

