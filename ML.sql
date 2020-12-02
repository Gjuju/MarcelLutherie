-- créa tables

CREATE TABLE users (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nom varchar(100) NOT NULL,
    prenom varchar(100) NOT NULL,
    email varchar(255) NOT NULL,
    adresse varchar(255) NOT NULL,
    cp varchar(5) NOT NULL,
    ville varchar(255) NOT NULL,
    admin int(2) DEFAULT 0,
    mdp varchar(255) NOT NULL ) ;


CREATE TABLE article (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, ref varchar(20) NOT NULL, designation varchar(100) NOT NULL, prix decimal(7,2) NOT NULL);
CREATE TABLE compo_art_cat (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, id_art int, id_cat int);
CREATE TABLE categorie (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, nom_cat varchar(20) NOT NULL);
CREATE TABLE options (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, nom_opt varchar(20) NOT NULL, prix decimal(7,2) NOT NULL, id_cat int );
CREATE TABLE devis (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, id_user int NOT NULL, id_art int NOT NULL, date_devis DATE );
CREATE TABLE dev_opt (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, id_dev int NOT NULL, id_opt int NOT NULL);


-- Ajout des contraintes type « clés étrangères)
ALTER TABLE options add constraint FK_OPT_CAT FOREIGN KEY (id_cat) REFERENCES categorie(id) ;
ALTER TABLE compo_art_cat add constraint FK_COMP_ART FOREIGN KEY (id_art) REFERENCES article(id) ;
ALTER TABLE compo_art_cat add constraint FK_COMP_CAT FOREIGN KEY (id_cat) REFERENCES categorie(id) ;
ALTER TABLE devis add constraint FK_DEV_USR FOREIGN KEY (id_user) REFERENCES users(id) ;
ALTER TABLE devis add constraint FK_DEV_ART FOREIGN KEY (id_art) REFERENCES article(id) ;
ALTER TABLE dev_opt add constraint FK_DEVOPT_DEV FOREIGN KEY (id_dev) REFERENCES devis(id) ;
ALTER TABLE dev_opt add constraint FK_DEVOPT_OPT FOREIGN KEY (id_opt) REFERENCES options(id) ;



-- insert into users
INSERT INTO users (nom, prenom, email, adresse, cp, ville, admin, mdp) VALUES
('Lutherie', 'Marcel', 'marcel@lutherie.com', '17 rue des guitares', '34270', 'le triadou', 1, '1234'),
('Sawyer', 'Tom', 'tom@test.com', '3 boulevard de test', '33000', 'bordeaux', 0, '1234'),
('Martin', 'Alain', 'alain@gmail.com', '18 rue du pont', '75000', 'Paris', 0, '123456'),
('Toto', 'Tata', 'toto@tata.com', '16 av le cours', '13000', 'Mars', 0, '123456'),
('Rob', 'Carmet', 'rom@carmet.com', '55 av de la libé', '84000', 'Avignon', 0, '12356');


-- insert into article
Insert into article (ref, designation, prix) values ('GS1', 'Guitare Strat', 1850) ;
Insert into article (ref, designation, prix) values ('BJ1', 'Basse jazz', 1750) ;


-- insert into categorie
Insert into categorie (nom_cat) values ('Manche') ;
Insert into categorie (nom_cat) values ('Touche') ;
Insert into categorie (nom_cat) values ('Corps') ;
Insert into categorie (nom_cat) values ('Finition') ;
Insert into categorie (nom_cat) values ('Micros') ;



-- insert into options
-- manche
Insert into options (nom_opt,prix,id_cat) values ('érable','0',1) ;
Insert into options (nom_opt,prix,id_cat) values ('Padouk','80',1) ;
Insert into options (nom_opt,prix,id_cat) values ('Acajou','120',1) ;

-- touche
Insert into options (nom_opt,prix,id_cat) values ('érable','0',2) ;
Insert into options (nom_opt,prix,id_cat) values ('Palissandre Inde','40',2) ;
Insert into options (nom_opt,prix,id_cat) values ('Palissandre Rio','100',2) ;
Insert into options (nom_opt,prix,id_cat) values ('Ebene Macassar','140',2) ;

-- corps
Insert into options (nom_opt,prix,id_cat) values ('Aulne','0',3) ;
Insert into options (nom_opt,prix,id_cat) values ('Tilleul','0',3) ;
Insert into options (nom_opt,prix,id_cat) values ('Frêne','120',3) ;
Insert into options (nom_opt,prix,id_cat) values ('Acajou','180',3) ;

-- finition
Insert into options (nom_opt,prix,id_cat) values ('Huilée Naturelle','0',4) ;
Insert into options (nom_opt,prix,id_cat) values ('Poly Naturelle','0',4) ;
Insert into options (nom_opt,prix,id_cat) values ('Poly Rouge','180',4) ;
Insert into options (nom_opt,prix,id_cat) values ('Ply Noire','180',4) ;
Insert into options (nom_opt,prix,id_cat) values ('Ply SunBurst','220',4) ;

-- Micros
Insert into options (nom_opt,prix,id_cat) values ('Micros simples','0',5) ;
Insert into options (nom_opt,prix,id_cat) values ('Micros doubles','60',5) ;


-- insert into compo_art_cat
Insert into compo_art_cat (id_art, id_cat) values (1,1) ;
Insert into compo_art_cat (id_art, id_cat) values (1,2) ;
Insert into compo_art_cat (id_art, id_cat) values (1,3) ;
Insert into compo_art_cat (id_art, id_cat) values (1,4) ;
Insert into compo_art_cat (id_art, id_cat) values (2,1) ;
Insert into compo_art_cat (id_art, id_cat) values (2,2) ;
Insert into compo_art_cat (id_art, id_cat) values (2,3) ;
Insert into compo_art_cat (id_art, id_cat) values (2,5) ;



-- *** fait ***


-- sortir les catégorie d'options
select categorie.id, nom_cat from categorie join compo_art_cat on categorie.id = compo_art_cat.id_cat where id_art = ? 


-- sortir le nom des options par id de catégorie :
select id, nom, prix from options where id_cat = ?

-- sortir nom_cat, nom_option et prix suffisant pour exercice :
SELECT categorie.nom_cat, options.nom_opt, options.prix FROM categorie JOIN options ON options.id_cat = categorie.id 

-- sortir : categorie.id , categorie.nom_cat , options.nom_opt , options.prix
SELECT categorie.id , categorie.nom_cat, options.nom_opt, options.prix FROM categorie JOIN options ON options.id_cat = categorie.id 
SELECT categorie.id , categorie.nom_cat, options.nom_opt, options.prix FROM categorie JOIN options ON options.id_cat = categorie.id

-- sortir : 