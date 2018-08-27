
CREATE TABLE Uzytkownicy(
  Id INT(6) NOT NULL PRIMARY KEY,
  Imie VARCHAR(45),
  Nazwisko VARCHAR(45) ,
  haslo VARCHAR(45) ,
  Plec VARCHAR(45) );

CREATE TABLE Posty(
  Id_p INT(6) NOT NULL PRIMARY KEY,
  Tytul VARCHAR(45) NOT NULL,
  Tresc TEXT NOT NULL ,
  Data DATE NOT NULL,
  Fname VARCHAR(25),
  BOOL DEFAULT FALSE,
  Id INT(6) REFERENCES Uzytkownicy(Id));

CREATE TABLE BAN(
Id_b INT(6) NOT NULL PRIMARY KEY,
Id INT(6) REFERENCES Uzytkownicy(Id));


Insert into  Uzytkownicy(ID,IMIE,NAZWISKO,HASLO,PLEC) values 
('1','Maciej','Maciejski','Maciej123', 'Mezczyzna');
Insert into  Uzytkownicy(ID,IMIE,NAZWISKO,HASLO,PLEC) values 
('2','Krzys','Niekowalski','maslo123','Mezczyzna');
Insert into  Uzytkownicy(ID,IMIE,NAZWISKO,HASLO,PLEC) values 
('3','Niekrzys','Kowalski','kowal123','Mezczyzna');

Insert into  Posty(Id_p ,Tytul,Tresc,Data,Id) values 
('1','Pierwszy post','I co mam tutaj napisac',CURDATE(),'2');
Insert into  Posty(Id_p ,Tytul,Tresc,Data,Id) values 
('2','Drugi post','nwm',CURDATE(),'1');
Insert into  Posty(Id_p ,Tytul,Tresc,Data,Id) values 
('3','Trzeci','Wiec jak dodawac te posty',CURDATE(),'3');


Insert into  Ban(ID_B, Id) values 
('1','2');