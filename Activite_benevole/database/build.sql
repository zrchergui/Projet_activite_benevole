DROP TABLE IF EXISTS Disponibilite;
DROP TABLE IF EXISTS Participe;
DROP TABLE IF EXISTS Identifiants;
DROP TABLE IF EXISTS Benevole;
DROP TABLE IF EXISTS CodesPostaux;
DROP TABLE IF EXISTS Activite;
DROP TABLE IF EXISTS Administration;

CREATE TABLE Administration(   
   MailAdmin VARCHAR(50) CONSTRAINT contrainte_MailAdmin CHECK (MailAdmin LIKE '%@%.%'),
   MdpAdmin VARCHAR(50) NOT NULL,
   IdAdmin INTEGER,
   PRIMARY KEY(MailAdmin)
);

CREATE TABLE Activite(
   IdAct INTEGER PRIMARY KEY AUTOINCREMENT,
   DiscrAct LONGTEXT,
   DateAct DATE,
   HeureD TIME,
   HeureF TIME CONSTRAINT contrainte_HeureF CHECK (HeureF>HeureD),
   DispoBnv VARCHAR(50) CONSTRAINT contrainte_DispoBnv CHECK ((DispoBnv) IN ('Matin', 'Apres Midi','Soir'))
   
);

CREATE TABLE CodesPostaux(
   CP INT,
   Ville VARCHAR(50),
   PRIMARY KEY(CP)
);

CREATE TABLE Benevole(
   IdBnv  INTEGER PRIMARY KEY AUTOINCREMENT,
   NomBnv VARCHAR(50),
   PrenomBnv VARCHAR(50),
   Rue TEXT,
   TelBnv VARCHAR(10),
   DateCreationComp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   CP INT,
   Civility VARCHAR(50) CONSTRAINT contrainte_Civility CHECK ((Civility) IN ('Monsieur','Madame')),
   Birthday DATE,
   PermisB VARCHAR(50) CONSTRAINT contrainte_PermisB CHECK (PermisB IS NULL OR PermisB IN ('possession')),
   FOREIGN KEY(CP) REFERENCES CodesPostaux(CP)
);

CREATE TABLE Identifiants(
   MailBnv VARCHAR(50) CONSTRAINT contrainte_MailBnv CHECK (MailBnv LIKE '%@%.%'),
   MotDP VARCHAR(50) NOT NULL,
   IdBnv INTEGER,
   FOREIGN KEY(IdBnv) REFERENCES Benevole(IdBnv),
   PRIMARY KEY(MailBnv)
);

CREATE TABLE Participe(  
   IdBnv INTEGER,
   IdAct INTEGER,
   Etat VARCHAR(50) CONSTRAINT contrainte_EtatActivite CHECK (Etat IS NULL OR Etat IN ('Accepter', 'Refuser')),
   PRIMARY KEY(IdBnv ,IdAct),
   FOREIGN KEY(IdBnv) REFERENCES Benevole(IdBnv),
   FOREIGN KEY(IdAct) REFERENCES Activite(IdAct) 
);

CREATE TABLE Disponibilite(
   Jour VARCHAR(50) CONSTRAINT contrainte_Jour CHECK ((Jour) IN ('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche')),
   PartieduJour VARCHAR(50) CONSTRAINT contrainte_PJour CHECK ((PartieduJour) IN ('Matin', 'Apres Midi','Soir')),
   IdBnv INTEGER,
   FOREIGN KEY(IdBnv) REFERENCES Benevole(IdBnv),
   PRIMARY KEY(Jour, PartieduJour, IdBnv)
);
