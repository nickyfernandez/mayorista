show databases;
create database if not exists caramelo;
use caramelo;
create table if not exists users(
	id_user int NOT NULL,
	email varchar(100) not null,
	password varchar(20) not null,
	tipe enum('classic' , 'gold'),
    avatar varchar(200) not null,
    isadmin int,
	primary key(id_user)

)engine=innodb;