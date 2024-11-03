create database if not exists portfolio;
use portfolio;

drop table if exists users;
create table if not exists users(
	id int primary key auto_increment,
	name varchar(24) unique not null,
	passwd varchar(255) not null,
	is_admin tinyint(1) default 0 not null,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp on update current_timestamp
);

drop table if exists projects;
create table if not exists projects(
	id int primary key auto_increment,
	user_id int,
	title varchar(50) not null,
	description varchar(255),
	content text not null,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp on update current_timestamp,
	foreign key (user_id) references users(id)
);


drop table if exists experiences;
create table if not exists experience(
	id int primary key auto_increment,
	user_id int,
	title varchar(50),
	company varchar(255) not null,
	date_from date,
	date_to date,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp on update current_timestamp,
	foreign key (user_id) references users(id)
);

drop table if exists contact;
create table if not exists contact(
	id int primary key auto_increment,
	name varchar(50) not null,
	email varchar(255) not null,
	message text not null,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp on update current_timestamp
)