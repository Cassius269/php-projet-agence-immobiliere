USE bdd_annonces_immobilieres;

SELECT *
FROM user;

-- Insertion des données utilisateurs
INSERT INTO User(email, password, created_at)
	VALUES('jean-dupont@email.com','azerty', now()),
			('bob.martin@gmail.com','azerty', now()), 
			('yves-dupont@email.com','azerty', now()),
			('jean.gabin@gmail.com','azerty', now()), 
			('jules-philipes@email.com','azerty', now()),
			('bob.martin@email.com','azerty', now());

-- Insertion des données des types de transaction
INSERT INTO Transaction_type(name, created_at)
		VALUES('location',now()),
			('vente', now());
 
-- Afficher les types de transaction 
SELECT *
FROM Transaction_type;

-- Insertion des données des types de propriété
INSERT INTO Property_type(name, created_at)
		VALUES('maison', now()),
			('appartement', now());

-- Afficher les types de propriété 
SELECT *
FROM Property_type;

-- Insertion des données des annonces immobilières
INSERT INTO listing(title, description, price, city, image_url, property_type_id, transaction_type_id, user_id, created_at)
	VALUES("Studio meublé","Studio de 20 m² meublé avec kitchenette et salle d’eau. Connexion internet incluse. À 3 minutes à pied du tramway et des universités.", 560, "Montpellier","https://placehold.co/300x200/EEE/31343C", 2,1,1,now() ),
		('Appartement 2 pièces','Appartement de 48m² comprenant 1 chambre, un séjour lumineux et un balcon exposé sud. Parking privé inclus. À deux pas du métro, disponible immédiatement.', 850, "Lyon","https://placehold.co/300x200/EEE/31343C", 2, 1, 2, now()),
        ('Loft moderne', 'Loft de 90m² très lumineux offrant une grande pièce à vivre et une cuisine équipée, au cœur du centre historique de Bordeaux. Prestations contemporaines.', 495000, 'Bordeaux', 'https://placehold.co/300x200/EEE/31343C', 2, 2, 1, now()), 
        ('Charmante maison','Maison de 110m², 4 pièces, avec un jardin privatif arboré de 200 m² située dans un quartier calme de Nantes. Proche des écoles et des commerces. Idéale pour une famille.',375000, 'Nantes', 'https://placehold.co/300x200/EEE/31343C', 1, 2, 3, now()),
        ('Maison contemporaine', 'Belle maison de 180m²  avec piscine, séjour lumineux, cuisine ouverte, 4 chambres, 3 salles de bains. Terrain paysager de 900 m² avec piscine chauffée. Quartier résidentiel, calme absolu', 620000,  'Aix-en-provence', 'https://placehold.co/300x200/EEE/31343C', 1, 2, 1, now()),
        ('Charmante maison','Maison de 110m², 4 pièces, avec un jardin privatif arboré de 200 m² située dans un quartier calme de Nantes. Proche des écoles et des commerces. Idéale pour une famille.',375000, 'Nantes', 'https://placehold.co/300x200/EEE/31343C', 1, 2, 3, now()),
        ('Appartement moderne', 'Appartement de 100m² très lumineux offrant une grande pièce à vivre, au cœur du centre historique de Lyon. Prestations contemporaines.', 495000, 'Lyon', 'https://placehold.co/300x200/EEE/31343C', 2, 2, 1, now());


  -- Vérifier l'insertion des annoncées immoblilières en base de données
  SELECT *
  FROM listing;
  
  -- Peuplement des rôles utilisateurs
INSERT INTO role(name)
	VALUES('agent'),
			('admin'),
            ('user');
            
-- Attribuer des rôles aux utilisateurs
INSERT INTO User_roles(user_id, role_id, is_activated)
	VALUES 	(1, 1, 1),
			(1, 3, 1),
            (2, 3, 1),
            (2, 2, 1),
  			(3, 3, 1),
            (3, 1, 1),
            (4, 1, 1),
			(4, 3, 1),
            (5, 3, 1),
            (5, 2, 1),
            (6, 3, 1),
            (6, 2, 1);
                                  

  
