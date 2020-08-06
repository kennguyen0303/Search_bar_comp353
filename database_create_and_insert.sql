
-- create table Job_Category(
-- 	job_category_id int auto_increment primary key,
--     name varchar(50)
-- );
-- insert into Job_Category(name)
-- values ("engineering"),("computer science"),("chemistry"),("doctors"),("architecture");
-- create table Job_Status(
-- 	job_status_id int auto_increment primary key,
--     name varchar(30)
-- );
-- insert into Job_Status(name)
-- values ("open"),("interviewing"),("closed");
-- create table Jobs(
-- 	job_id int auto_increment primary key,
--     job_category_id int,
-- 	job_status_id int,
--     title varchar(50),
--     description varchar(255),
--     company_name varchar(50),
--     date_posted datetime,
--     number_of_position int,
--     number_of_applicant int,
--     foreign key(job_category_id) references Job_Category(job_category_id),
--     foreign key(job_status_id) references Job_Status(job_status_id)
-- )
insert into Jobs(job_category_id,job_status_id,title,description,company_name,date_posted,number_of_position,
number_of_applicant) 
values (1,1,"Software engineer","we need a guy to fix computer","Google","2020-08-08 08:00:00",3,0),
(2,3,"Software engineer","we need a guy to fix computer","Google","2020-08-08 08:00:00",3,3),
(3,1,"Chemical engineer","we need a guy to design new drug for sale","Ken Drugs","2020-08-08 08:00:00",3,1),
(4,1,"Optermistry","we need a guy to fix eyes","Somewhere Hospital","2020-08-08 08:00:00",1,100),
(5,1,"Architect","we need a guy to fix houses","Ken Construction","2020-08-08 08:00:00",3,0),
(5,2,"Civil engineer","we need a guy to fix foundations of houses","Ken Construction","2020-08-08 08:00:00",3,0)