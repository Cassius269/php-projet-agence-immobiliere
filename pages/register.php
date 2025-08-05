<?php
    // Créer une variable de stockage des erreurs
    $errors = [];
    // Vérifier si une requête a été envoyée en POST, c'est normalement le formulaire soumis
    if($_SERVER["REQUEST_METHOD"] == "POST") {


        // Traitement des données
        // Etape 1: nettoyage des données
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmPassword = trim($_POST['confirm_password']);

        var_dump($_POST);
        // Etape 2: vérification des données
        if(empty($_POST['email'])) {
            $errors =['Le mail est obligatoire'];
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Email correct';
        }else {
            $errors[] = 'email incorrect';
        }

        if($password === $confirmPassword) {
            echo 'mots de passe similaires';
        }else {
            echo 'Les deux mots de passe ne sont pas similaires';
            $errors[] = 'Les deux mots de passe ne sont pas similaires';
        }

        // Etape 3: stockage des données utilisateur dans la session si données valides
        if(empty($errors)){
            echo 'Données valides';
        }
        echo '<br>';


        // Etape 4: redirection de l'utilsateur

    }
?>
<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page d'inscription du site officiel de Find My Dream Home">
   <!-- Intégration de Bootstrap au projet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> 
   <!-- Intégration du CSS personnalisé -->  
    <link rel="stylesheet" href="assets/css/styles.css">  
    <title>Page d'inscription</title>
</head>
<body>
    <!-- Inclure le header -->
    <?php require_once '../includes/partials/_header.php' ?>
    <main class="container">
        <h2 class="mb-5"> Créer un compte sur Find My Dream Homee</h2>
        <form action="<?=  $_SERVER['REQUEST_URI'] ?>" method="POST" class="w-50 bg-secondary m-auto p-5 rounded">
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" required class="form-control">
            </div>
            <div>
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" maxlength="10" required class="form-control">               
            </div>
            <div>
                <label for="confirm_password" class="form-label">Confirmation du mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" maxlength="10" required class="form-control">               
            </div> 
            <input type="submit" value="S'inscrire" class="btn btn-primary mt-3">

            <!-- Affichage des erreurs s'il y en a -->
            <? if(!empty($errors)) : ?>
                <h6>Merci de corriger les erreurs ci-dessous</h6>
                <ul>
                    <? foreach($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <? endforeach; ?> 
                </ul>
            <? endif; ?>
        </form>
        <button type="button" class="btn btn-secondary d-block m-auto mt-4"><a href="" class="text-white">Déjà inscrit ? Connectez-vous</a></button>
    </main>    
    <!-- Inclure le footer -->
     <?php require_once '../includes/partials/_footer.php' ?>
</body>
</html>