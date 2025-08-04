<?php
    // Récupération des données
    require_once 'includes/appartements.php';
    require_once 'includes/maisons.php';

    // var_dump($appartements);
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
    <title>Page d'accueil</title>
</head>
<body>
    <?php require_once 'includes/_header.php' ?>
    <main class="container">
        <section>
            <h2>Nos annonces de maisons</h2>
            <hr>
            <?php foreach($maisons as $annonce){
                include 'includes/_card_annnonce.php';
            } 
            ?>
        </section>
        <section>
            <h2>Nos annonces d'appartement</h2>
            <hr>
            <?php foreach($appartements as $annonce){
                include 'includes/_card_annnonce.php';
            } 
            ?>
        </section>
    </main>
    <?php require_once 'includes/_footer.php' ?>
</body>
</html>