CREATE TYPE type_compte_enum AS ENUM ('Principale', 'Secondaire');
CREATE TYPE type_transaction_enum AS ENUM ('Depot', 'Paiement', 'Retrait');
Create TYPE statut_transaction_enum AS ENUM ('Valide', 'Annule');

CREATE TABLE roles (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(150) NOT NULL,
    login VARCHAR(20) UNIQUE NOT NULL,
    password VARCHAR(65) NOT NULL,
    adresse TEXT,
    numero_carte_identite VARCHAR(15),
    photo_identite_recto VARCHAR(255),
    photo_identite_verso VARCHAR(255),
    role_id INTEGER NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE comptes (
    id SERIAL PRIMARY KEY,
    telephone VARCHAR(20),
    type_compte type_compte_enum NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    solde DECIMAL(15,2) DEFAULT 0,
    user_id INTEGER NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE transactions (
    id SERIAL PRIMARY KEY,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    type_transaction type_transaction_enum NOT NULL,
	statut_transaction statut_transaction_enum NOT NULL,
    montant DECIMAL(15,2) NOT NULL,
    compte_id INTEGER NOT NULL,
    FOREIGN KEY (compte_id) REFERENCES comptes(id)
);

INSERT INTO roles (nom) VALUES 
('client'),
('commercial');