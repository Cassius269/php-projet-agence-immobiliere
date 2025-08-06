<?php
    // Reprendre la session en cours
    session_start();


?>

<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page d'accueil du site officiel de Find My Dream Home">
   <!-- Intégration de Bootstrap au projet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> 
   <!-- Intégration du CSS personnalisé -->  
    <link rel="stylesheet" href="assets/css/styles.css">  
    <title>Page d'accueil</title>
</head>
<body>
    <!-- Importer le partial du header -->
    <?php require_once '../includes/partials/_header.php' ?>
    <main class="container mb-5">
        <section class="mb-5">
            <h2>Formulaire d'ajout de nouvelle annonce immobilière</h2>
            <form action="#" method="POST"></form>
            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre">
            </div>
            <div>
                <label for="propertyType">Type de propriété</label>
                <select name="propertyType" id="propertyType">
                    <option value="">---Veuillez sélectionner le type de propriété ---</option> 
                    <option value="maison">Maison</option>
                    <option value="appartement">Appartement</option>
                </select>
            </div>
            <div>
                <label for="price">Prix</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="localisation">Ville</label>
                <select name="localisation" id="localisation">
                    <option value="">---Veuillez sélectionner la ville ---</option> 
                    <option value="paris">Paris</option>
                    <option value="lyon">Lyon</option>
                </select>              
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>
        </section>
    </main>

    <!-- Importer le partial du footer -->
    <?php require_once '../includes/partials/_footer.php' ?>
</body>
</html>

<!--- 
- Doit contenir :
    - **Titre**
    - **Formulaire** avec les champs :
        - **Image**
        - **Titre**
        - **Prix**
        - **Ville**
        - **Description courte**
        - **Type** *(Rent / Sale)*
        - **Bouton “Enregistrer”**
    - Un lien **“Retour à l’accueil”** sous le formulaire

-->