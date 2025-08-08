<?php
    // Reprendre la session en cours
    session_start();
    
    // Importer la connexion à la base de données
    require_once '../includes/data/DB.php';

    //Importer les fonctions de requêtage
    require_once '../includes/data/functions.php';


    // Vérifier si l'utilsateur est connecté ou le rediriger s'il n'est pas en ligne    
    if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn']=== false){
        header('Location: ../index.php');
        exit;
    }


    // Stocker les erreurs trouvées
    $errors = [];

    // Vérifier si le formulaire de nouvelle annonce a été soumis
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Traitement du formulaire
        // Vérifier si l'utilisateur a bien envoyé des données
        if(empty($_POST['title'])){
            echo 'Le titre est obligatoire';
            $errors[] = 'Le titre est obligatoire';
        }

        if(empty($_POST['description'])){
            echo 'La description est obligatoire';
            $errors[] = 'La description est obligatoire';
        }

        if(empty($_POST['price'])){
            echo 'Le prix est obligatoire';
            $errors[] = 'Le prix est obligatoire';
        }

        if(empty($_POST['image_url'])){
            echo 'L\'image est obligatoire';
            $errors[] = 'Le lien de l\'image est obligatoire';
        }
    
        
        if(empty($_POST['localisation'])){
            echo 'La localisation est obligatoire';
            $errors[] = 'La localisation est obligatoire';
        }


        if(empty($_POST['propertyType'])){
            echo 'Le type de bien est obligatoire';
            $errors[] = 'Le type de bien est obligatoire';
        }

        if(empty($_POST['transactionType'])){
            echo 'Le type de transaction est obligatoire';
            $errors[] = 'Le type de transaction est obligatoire';
        }

        // Envoyer en base de données si aucune erreur de saisie utilisateur
        if(empty($errors)){
            echo 'pas d\erreur';

            try {
                // Créer une requête SQL préparée et l'executer
            $sql="INSERT INTO Listing(title, description, price, city, image_url, property_type_id, transaction_type_id, user_id, created_at)
                                    VALUES(:title, :description, :price, :city, :image_url, :property_type_id, :transaction_type_id, 2, NOW())";
            
                // Préparer la requête
                $preparedQuery = $db->prepare($sql);
                // Executer la requête
                $preparedQuery->execute([
                    'title' => $_POST['title'], 
                    'description' =>  $_POST['description'],
                    'price' => $_POST['price'],
                    'city' => $_POST['localisation'], 
                    'image_url' =>  $_POST['image_url'],
                    'property_type_id' => getPropertyTypeId($_POST['propertyType']),
                    'transaction_type_id' => getTransactionTypeId($_POST['transactionType'])
                ]);
                echo 'Nouvelle annonce ajoutée';
            }catch(PDOException $e){
                die($e->getMessage());
            }
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
    <!-- Importer le partial du header -->
    <?php require_once '../includes/partials/_header.php' ?>
    <main class="container mb-5">
        <section class="mb-5">
            <h2 class="mb-5">Ajouter une nouvelle annonce</h2>
            <form action="#" method="POST" class="mb-4 w-50 bg-secondary m-auto p-5 rounded">
                <div class="mb-3">
                    <label for="title" class="form-label text-white">Titre</label>
                    <input type="text" name="title" id="title" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-white">Description courte</label>
                    <textarea name="description" id="description" maxlength="200" required class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label text-white">Prix</label>
                    <input type="number" name="price" id="price" class="form-control" min="0">
                </div>
                <div class="mb-3">
                    <label for="localisation" class="form-label text-white">Ville</label>
                <input type="text" name="localisation" id="localisation" required class="form-control">     
                </div>
                <!-- <div class="mb-3">
                    <label for="image" class="form-label text-white">Image</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" required class="form-control">
                </div> -->
                <div class="mb-3">
                    <label for="image_url" class="form-label text-white">Lien de l'image</label>
                    <input type="text" name="image_url" id="image_url" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="propertyType" class="form-label text-white">Type de bien</label>
                    <select name="propertyType" id="propertyType" required class="form-select">
                            <option value="" selected>-- Veuillez selectionner le type de propriété</option>
                            <option value="maison">maison</option>
                            <option value="appartement">appartement</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="transactionType" class="form-label text-white">Type de transaction</label>
                    <select name="transactionType" id="transactionType" required class="form-select">
                            <option value="" selected>-- Veuillez selectionner le type de transaction</option>
                            <option value="location">location</option>
                            <option value="vente">vente</option>
                    </select>               
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <a href="../index.php" class="btn btn-secondary d-block m-auto w-25">Revenir à la page d'accueil</a>
        </section>
    </main>

    <!-- Importer le partial du footer -->
    <?php require_once '../includes/partials/_footer.php' ?>
</body>
</html>