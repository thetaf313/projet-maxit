-- INSERT INTO users (nom, prenom, login, password, adresse, numero_carte_identite, photo_identite_recto, photo_identite_verso, role_id)
-- VALUES
-- ('Sow', 'Amina', '770000001', 'password123', 'Dakar, Médina', '1000100010001', 'images/recto1.jpg', 'images/verso1.jpg', 1),
-- ('Diop', 'Ibrahima', '770000004', 'password123', 'Dakar, Liberté 6', '1000100010002', 'images/recto2.jpg', 'images/verso2.jpg', 1),
-- ('Fall', 'Ndeye', '770000007', 'password123', 'Dakar, Plateau', '1000100010003', 'images/recto3.jpg', 'images/verso3.jpg', 2);

INSERT INTO comptes (telephone, type_compte, solde, user_id) VALUES
('770000001', 'Principale', 100000, 1),
('770000002', 'Secondaire', 50000, 1),
('770000003', 'Secondaire', 20000, 1);

INSERT INTO comptes (telephone, type_compte, solde, user_id) VALUES
('770000004', 'Principale', 80000, 2),
('770000005', 'Secondaire', 40000, 2),
('770000006', 'Secondaire', 10000, 2);

INSERT INTO transactions (type_transaction, statut_transaction, montant, compte_id) VALUES
('Depot', 'Valide', 50000, 1),
('Retrait', 'Valide', 10000, 1),
('Depot', 'Valide', 20000, 2),
('Retrait', 'Valide', 5000, 2),
('Depot', 'Valide', 10000, 3),
('Retrait', 'Valide', 2000, 3);

INSERT INTO transactions (type_transaction, statut_transaction, montant, compte_id) VALUES

('Depot', 'Valide', 40000, 4),
('Retrait', 'Valide', 8000, 4),
('Depot', 'Valide', 15000, 5),
('Retrait', 'Valide', 3000, 5),
('Depot', 'Valide', 8000, 6),
('Retrait', 'Valide', 1000, 6);
