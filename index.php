<?php
    // Démarrage ou reprise de la session
    session_start();
    
    // Récupération des données
    // require_once 'includes/data/appartements.php';
    // require_once 'includes/data/maisons.php';

    // Importation de l'instance de connexion (PDO)
    require_once 'includes/data/DB.php';

    // Récuperer les maisons
    function getAllHouses(){
        // imporater la variable $db de connexion à la base de données
        global $db;

        // Requête direct. Pas besoin de requête préparée car la requête est en dure et aucune entrée utilisateur dynamique à récupérer
        $sql = "SELECT l.id, l.title, l.description, l.price, l.city, l.image_url, pt.name as 'property_type', tt.name as 'transaction_type'
                FROM listing l
                INNER JOIN property_type pt
                ON l.property_type_id=pt.id
                INNER JOIN transaction_type tt
                ON l.transaction_type_id=tt.id
                WHERE pt.name='maison' 
                LIMIT 3";

        $result = $db->query($sql);

        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        // exit;
        if($data){
            return $data;
        }else {
            throw new PDOException('Problème de récupération des données');
        }
    }

    $houses=getAllHouses();

    // Récuperer les appartements
    function getAllAppartments(){
        // imporater la variable $db de connexion à la base de données
        global $db;

        // Requête direct. Pas besoin de requête préparée car la requête est en dure et aucune entrée utilisateur dynamique à récupérer
        $sql = "SELECT l.id, l.title, l.description, l.price, l.city, l.image_url, pt.name as 'property_type', tt.name as 'transaction_type'
                FROM listing l
                INNER JOIN property_type pt
                ON l.property_type_id=pt.id
                INNER JOIN transaction_type tt
                ON l.transaction_type_id=tt.id
                WHERE pt.name='appartement'
                LIMIT 3";

        $result = $db->query($sql);

        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        // exit;
        if($data){
            return $data;
        }else {
            throw new PDOException('Problème de récupération des données');
        }
    }

    $appartments=getAllAppartments();

    // Compter le nombre de maisons
    function countAppartments(){
        global $db;

        $sql="SELECT count(*) as 'nbr_appartements'
        FROM listing l
        INNER JOIN property_type pt
        ON l.property_type_id=pt.id
        WHERE pt.name='appartement'";

        $result=$db->query($sql);

        $data = $result->fetch(PDO::FETCH_ASSOC);
        // var_dump($data);
        // exit;

        if($data){

            return $data['nbr_appartements'];
        }else {
            throw new PDOException('Erreur de récupération lors de la récupération du nbre d\'appartements');
        }

    }

    countAppartments();
    // Compter le nombre d'appartements
       function countHouses(){
        global $db;

        $sql="SELECT count(*) as 'nbr_maisons'
        FROM listing l
        INNER JOIN property_type pt
        ON l.property_type_id=pt.id
        WHERE pt.name='maison'";

        $result=$db->query($sql);

        $data = $result->fetch(PDO::FETCH_ASSOC);
        // var_dump($data);
        // exit;

        if($data){

            return $data['nbr_maisons'];
        }else {
            throw new PDOException('Erreur de récupération lors de la récupération du nbre de maisons');
        }

    }
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
    <?php require_once 'includes/partials/_header.php' ?>
    <main class="container mb-5">
        <section class="mb-5">
            <h2>Nos annonces de maisons</h2>
            <hr>
            <div class="row gap-3 d-flex justify-content-center">
                <?php foreach($houses as $annonce){
                    include 'includes/partials/_card_annnonce.php';
                } 
            ?>
            </div>
            <?php if(countAppartments() > 3) : ?>
                <a href="#" class="d-flex justify-content-end"><button class="btn btn-secondary mt-5">Voir +</button></a>
            <?php endif; ?>
        </section>
        <section class="mb-5">
            <h2>Nos annonces d'appartement</h2>
            <hr>
            <div class="row gap-3 d-flex justify-content-center">
            <?php foreach($appartments as $annonce){
                include 'includes/partials/_card_annnonce.php';
            } 
            ?>
            </div>
            <?php if(countHouses() > 3) : ?>
                <a href="#" class="d-flex justify-content-end"><button class="btn btn-secondary mt-5">Voir +</button></a>
            <?php endif; ?>
        </section>
    </main>
    <?php require_once 'includes/partials/_footer.php' ?>
</body>
</html>