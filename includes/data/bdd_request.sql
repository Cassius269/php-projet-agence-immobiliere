USE  bdd_annonces_immobilieres;

-- Afficher l'ID et le nom des types de propriété 
SELECT id, name
FROM property_type;

-- Afficher toutes les annonces
SELECT *
FROM listing;

-- Afficher l'ID du type de transaction liée à la propriété
SELECT id, name
FROM transaction_type;

-- Afficher les utilisateurs
SELECT *
FROM User;

-- Rechercher un utilisateur ayant le mail 'jean-dupont@email.com' et le mot de passe 'azerty'
SELECT id, email
FROM User
WHERE email='jean-dupont@email.com' AND password='azerty';


