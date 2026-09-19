CREATE DATABASE ecovie
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE ecovie;

CREATE TABLE utilisateurs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    nom VARCHAR(100) NOT NULL,
    postnom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    telephone VARCHAR(30) NOT NULL,

    ville VARCHAR(100) NOT NULL,

    participation ENUM(
        'benevole',
        'donateur',
        'partenaire',
        'membre'
    ) NOT NULL,

    password VARCHAR(255) NOT NULL,

    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);