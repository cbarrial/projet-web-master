CREATE TABLE tbl_user (
   id int(11) NOT NULL auto_increment,
   login varchar(8) NOT NULL,
   pwd varchar(8) NOT NULL,
   PRIMARY KEY (id),
   KEY ID_2 (id)
);

CREATE TABLE validation (
  id int(255) NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  pseudo VARCHAR(255) NOT NULL,
  passe VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  INDEX(id)
);

--remplissage de la table tbl_user
insert into tbl_user values(12345678910, 'cbarrial','motdepas' )
