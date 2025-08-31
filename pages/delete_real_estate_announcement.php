<?php

session_start(); // poursuivre la session

// Importer une instance de connexion à la base de données via PDO
require_once '../includes/data/DB.php';

// Vérifier la permission
// Seul un auteur peut supprimer son annonce ou l'ADMIN
    // Recupérer le paramètre ID de la requete
    try{
        if(isset($_GET['id'])){
            $announcementId= $_GET['id'];
        }
    }catch(Exception $e) {
        throw $e->getMessage();
    }

// Supprimer une annonce
function deleteRealEstateAnnouncement(int $listing_id){
    global $db;

    try{
        // Préparer la requête et l'executer
        $sql = 'CALL delete_real_estate_announcement(:listing_id)';
        $preparedQuery= $db->prepare($sql);

        $preparedQuery->execute([
            'listing_id' => $listing_id,
        ]);

    }catch(PDOException $e){
        die($e->getMessage());
    }
}
// Verifier si l'utilisateur connecté est bien l'auteur // email utilisateur = email auteur de l'annonce ?
function verifyAuthorOfAnnouncement(int $listing_id, string $email ){

    global $db;
    try{
        // Préparer la requête et l'executer
        $sql = 'CALL verify_author_of_announcement(:listing_id, :email)';
        $preparedQuery= $db->prepare($sql);

        $preparedQuery->execute([
            'listing_id' => $listing_id,
            'email' => $email
        ]);

        $data= $preparedQuery->fetch(PDO::FETCH_ASSOC);
        $preparedQuery->closeCursor();

        if($data){
            // Si ok, envoyer une requête légitime de suppression d'annonce
            if($data['compteur'] != 0 ){
                deleteRealEstateAnnouncement($listing_id);

                // Envoyer un message flash de succès
                $_SESSION['flashes']['success'][]= 'Annonce supprimée avec succès';
            }else {
                // Envoyer un message flash de succès
                 $_SESSION['flashes']['errors'][]= 'Vous n\'êtes pas autorisé(e)';
            }

            // Rediriger la page
            header("Location:../index.php");
            exit;
        }
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

verifyAuthorOfAnnouncement($announcementId, $_SESSION['email']);

// Si OK, 
