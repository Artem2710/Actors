 create table `actors`(     
 	`id` int(100) not null AUTO_INCREMENT,     
 	`full_name` varchar(100) not null default '',    
	`gender` varchar(20) not null default '',     
	PRIMARY KEY (`id`)     
 )CHARSET=utf8;

 insert into actors (full_name, gender) values ('Vasya', 'm'), ('Alex', 'm'), ('Alexey', 'm'), ('Jhony', 'enum'), ('Helen', 'f'), ('Jenny', 'f'), ('Lora', 'f');

 insert into any_actors (full_name, gender) values ('Gary', 'm'), ('Roma', 'm'),  ('Fill', 'enum'), ('Victoriya', 'f');

 insert into actors values (null, 'Fill', 'f', 14);

 insert into
    actors (full_name, gender)
select
    any_actors.full_name,
    any_actors.gender
from
    any_actors;

ALTER TABLE `actors` ADD `age` INT( 11 ) NOT NULL AFTER `gender`;


select full_name from actors where full_name like ('M%', 'F%') and gender in ('m', 'f') order by gender desc;

select distinct gender from actors;

select full_name from actors where left(full_name, 1) in ('F','M');

select full_name from actors where left(full_name, 1) in (select distinct gender from actors);