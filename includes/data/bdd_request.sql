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

-- Afficher les roles de chaque utilisateur par ordre décroissant
SELECT u.email, r.name 
FROM User_roles ur
INNER JOIN User u 
ON u.id = ur.user_id
INNER JOIN role r
ON r.id = ur.role_id
ORDER BY u.email DESC;

-- Récupération des rôles d'un utilisateur à partir d'une procédure stockée avec argument
DELIMITER //
CREATE PROCEDURE get_roles_by_email(email varchar(255))
BEGIN
	SELECT u.email, r.name 
	FROM User_roles ur
	INNER JOIN User u 
	ON u.id = ur.user_id
	INNER JOIN role r
	ON r.id = ur.role_id
    WHERE u.email = email
	ORDER BY r.name DESC;
END //
DELIMITER ;

-- Appeler la procédure de récupération des rôles d'un utilisateur
CALL get_roles_by_email("jean-dupont@email.com");


SELECT *
FROM listing;




