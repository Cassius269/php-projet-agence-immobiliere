USE  bdd_annonces_immobilieres;

-- Afficher l'ID et le nom des types de propriété 
SELECT id, name
FROM property_type;

-- Afficher toutes les annonces
SELECT *
FROM listing;

-- Afficher toutes les annonces de maison
SELECT l.id, l.title, l.description, l.price, l.city, l.image_url, pt.name as 'property_type', tt.name as 'transaction_type'
FROM listing l
INNER JOIN property_type pt
ON l.property_type_id=pt.id
INNER JOIN transaction_type tt
ON l.transaction_type_id=tt.id
WHERE pt.name='maison';

-- Afficher tous les appartements
SELECT l.id, l.title, l.description, l.price, l.city, l.image_url, pt.name as 'property_type', tt.name as 'transaction_type'
FROM listing l
INNER JOIN property_type pt
ON l.property_type_id=pt.id
INNER JOIN transaction_type tt
ON l.transaction_type_id=tt.id
WHERE pt.name='appartement';

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

-- Compter le nombre de maisons
SELECT count(*) as 'nbr_maisons'
FROM listing l
INNER JOIN property_type pt
ON l.property_type_id=pt.id
WHERE pt.name='maison';

-- Compter le nombre de maisons
SELECT count(*) as 'nbr_appartements'
FROM listing l
INNER JOIN property_type pt
ON l.property_type_id=pt.id
WHERE pt.name='appartement';