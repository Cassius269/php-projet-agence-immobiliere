-- Création de la base de données
DROP DATABASE IF EXISTS bdd_annonces_immobilieres;
CREATE DATABASE IF NOT EXISTS bdd_annonces_immobilieres;

-- Création des tables
USE  bdd_annonces_immobilieres;
CREATE TABLE User(
	id INT PRIMARY KEY AUTO_INCREMENT,
	email	VARCHAR(255)NOT NULL UNIQUE,
    created_at	DATETIME	NOT NULL,
    updated_at	DATETIME
);

CREATE TABLE Property_type(
	id INT PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at	DATETIME NOT NULL,
    updated_at	DATETIME    
);


CREATE TABLE Transaction_type(
	id	INT	PRIMARY KEY AUTO_INCREMENT,
	name	VARCHAR(100) NOT NULL ,	
	created_at	DATETIME NOT NULL,
	updated_at	DATETIME
);


CREATE TABLE Listing(
	id	INT	PRIMARY KEY AUTO_INCREMENT,
	title	VARCHAR(255)	NOT NULL,
	description	TEXT	NOT NULL,
	price	DOUBLE(9,2)	NOT NULL,
	city	VARCHAR(150)	NOT NULL,
	image_url	VARCHAR(255)	NULL,
	property_type_id	INT	NOT NULL,
	transaction_type_id	INT	NOT NULL,
	user_id	INT	NOT NULL,
	created_at	DATETIME NOT NULL,
	updated_at	DATETIME
);


-- Liaison des clés étrangères avec la table Listing
ALTER TABLE Listing
ADD CONSTRAINT FK_listing_to_property_type
FOREIGN KEY (property_type_id)
REFERENCES Property_type(id);


ALTER TABLE Listing
ADD CONSTRAINT FK_listing_to_transactiony_type
FOREIGN KEY (transaction_type_id)
REFERENCES Transaction_type(id);

-- Ajouter la colonne password à la table User
ALTER TABLE User
ADD password varchar(30) NOT NULL
AFTER email;
