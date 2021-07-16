insert into SHARES values (3,3);

insert into SHARES values (5,5);

insert into SHARES values (7,7);

insert into SHARES values (9,9);


CREATE TABLE TRADE
(
  Id_1 INT NOT NULL,
  TRADEId_2 INT NOT NULL,
  PRIMARY KEY (Id_1, TRADEId_2),
  FOREIGN KEY (Id_1) REFERENCES COUNTRY(Id),
  FOREIGN KEY (TRADEId_2) REFERENCES COUNTRY(Id)
);

insert into TRADE values (1,2);
insert into TRADE values (3,4);
insert into TRADE values (5,6);
insert into TRADE values (7,8);

CREATE TABLE SHIPS_Operating_Seq
(
  Operating_Seq INT NOT NULL,
  Number INT NOT NULL,
  Id INT NOT NULL,
  PRIMARY KEY (Operating_Seq, Number, Id),
  FOREIGN KEY (Number, Id) REFERENCES SHIPS(Number, Id)
);

CREATE TABLE SHIPS_Container_Code
(
  Container_Code INT NOT NULL,
  Number INT NOT NULL,
  Id INT NOT NULL,
  PRIMARY KEY (Container_Code, Number, Id),
  FOREIGN KEY (Number, Id) REFERENCES SHIPS(Number, Id)
);

