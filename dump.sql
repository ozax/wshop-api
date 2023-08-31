CREATE TABLE stores
(
    id        INT PRIMARY KEY AUTO_INCREMENT,
    nom       VARCHAR(255) NOT NULL,
    adresse   VARCHAR(255) NOT NULL,
    telephone VARCHAR(15)  NOT NULL,
    categorie VARCHAR(50),
);


INSERT INTO magasins (nom, adresse, telephone, categorie)
VALUES ('Magasin A', 'Adresse A', '+33111111111', 'Alimentation'),
       ('Magasin B', 'Adresse B', '+33222222222', 'Vêtements'),
       ('Magasin C', 'Adresse C', '+33333333333', 'Électronique');