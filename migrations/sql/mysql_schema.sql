CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(150) NOT NULL,
    login VARCHAR(20) UNIQUE NOT NULL,
    password VARCHAR(65) NOT NULL,
    adresse TEXT,
    numero_carte_identite VARCHAR(15) UNIQUE,
    photo_identite_recto VARCHAR(255),
    photo_identite_verso VARCHAR(255),
    role_id INT NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE comptes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    telephone VARCHAR(20) UNIQUE NOT NULL,
    type_compte ENUM('Principale', 'Secondaire') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    solde DECIMAL(15,2) DEFAULT 0,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    type_transaction ENUM('Depot', 'Paiement', 'Retrait') NOT NULL,
    statut_transaction ENUM('Valide', 'Annule') NOT NULL,
    montant DECIMAL(15,2) NOT NULL,
    compte_id INT NOT NULL,
    FOREIGN KEY (compte_id) REFERENCES comptes(id)
);

INSERT INTO roles (nom) VALUES 
('client'),
('commercial');
