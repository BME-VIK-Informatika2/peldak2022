Drop database if exists repulok;
Create database repulok;
Use repulok;

Create table Varos(
ID int primary key auto_increment,
Nev char(3)
); 

Create table Jarat(
ID int primary key auto_increment,
StartVaros int,
CelVaros int,
Constraint StartRef foreign key (StartVaros) references Varos(ID)
);

Insert into Varos(Nev) values ('BUD');
Insert into Varos(Nev) values ('BER');
Insert into Varos(Nev) values ('LON');
Insert into Varos(Nev) values ('MCQ');

Insert into Jarat(StartVaros, CelVaros) values (1,2);
Insert into Jarat(StartVaros, CelVaros) values (3,1);
Insert into Jarat(StartVaros, CelVaros) values (2,3);
Insert into Jarat(StartVaros, CelVaros) values (2,1);
Insert into Jarat(StartVaros, CelVaros) values (4,1);
