create database company;
use company;

create table companies
(
  id int(11)
  auto_increment primary key,
  name varchar
  (30) not null,
  registration_code varchar
  (30) not null,
  email varchar
  (30) not null,
  phone varchar
  (30) not null,
  comment varchar
  (500) not null


);