CREATE TABLE admin
(
  user     VARCHAR(20) PRIMARY KEY NOT NULL,
  password VARCHAR(32)             NOT NULL
);
CREATE TABLE docenten
(
  docentnummer INT PRIMARY KEY NOT NULL,
  voornaam     VARCHAR(20),
  voorvoegsel  VARCHAR(20),
  achternaam   VARCHAR(20),
  password     VARCHAR(32)
);
CREATE TABLE docentklas
(
  docentnummer INT DEFAULT 0          NOT NULL,
  klas         VARCHAR(11) DEFAULT '' NOT NULL,
  PRIMARY KEY (docentnummer, klas)
);
CREATE TABLE klassen
(
  klas VARCHAR(6) PRIMARY KEY NOT NULL
);
CREATE TABLE leerlingen
(
  leerlingnummer INT PRIMARY KEY        NOT NULL AUTO_INCREMENT,
  voornaam       VARCHAR(20) DEFAULT '' NOT NULL,
  voorvoegsel    VARCHAR(20) DEFAULT '' NOT NULL,
  achternaam     VARCHAR(20) DEFAULT '' NOT NULL,
  password       VARCHAR(32)
);
CREATE TABLE leerlingklas
(
  leerlingnummer MEDIUMINT DEFAULT 0    NOT NULL,
  klas           VARCHAR(11) DEFAULT '' NOT NULL,
  PRIMARY KEY (leerlingnummer, klas)
);
CREATE TABLE opgaven
(
  scoreid BIGINT PRIMARY KEY      NOT NULL,
  opgaven VARCHAR(200) DEFAULT '' NOT NULL
);
CREATE TABLE scores
(
  scoreid        BIGINT PRIMARY KEY       NOT NULL AUTO_INCREMENT,
  leerlingnummer INT DEFAULT 0            NOT NULL,
  spelnummer     INT DEFAULT 0            NOT NULL,
  niveau         INT DEFAULT 1            NOT NULL,
  score          REAL DEFAULT 0.000       NOT NULL,
  over           INT DEFAULT 0            NOT NULL,
  speeltijd      BIGINT DEFAULT 360000000 NOT NULL,
  tijdstip       DATETIME,
  toets          CHAR(1) DEFAULT 'N'      NOT NULL
);
CREATE TABLE spelen
(
  spelnummer   INT PRIMARY KEY        NOT NULL AUTO_INCREMENT,
  naam         VARCHAR(30) DEFAULT '' NOT NULL,
  omschrijving LONGTEXT
);
CREATE INDEX voornaam ON leerlingen (voornaam, achternaam);
CREATE INDEX leerlingnummer ON scores (leerlingnummer, spelnummer);
CREATE INDEX naam ON spelen (naam);

INSERT INTO `singleton`.`leerlingen` (`leerlingnummer`, `voornaam`, `voorvoegsel`, `achternaam`, `password`)
VALUES ('9494912', 'Nav', '', 'Appaiya', '9657');