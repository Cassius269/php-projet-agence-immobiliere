<?php
    // Ouvrir la session
    session_start();

    // Créer une variable de stockage des erreurs
    $errors = [];

    // Vérifier si une requête a été envoyée en POST, c'est normalement le formulaire soumis
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Traitement des données
        // Etape 1: récupération des données saisies
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Etape 2: vérification des donnée saisies
        if($username === 'admin' && $password === 'azerty'){
            // Stocker les informations utilisateur dans la session
            $_SESSION['username'] = $username;
            $_SESSION['isLoggedIn']= true;
            // $_SESSION['id_user'] =

            // Etape 3: redirection de l'utilsateur
            header('Location: ../index.php');
            exit;
        }else {
            $errors[] = 'identifiants incorrects';
        }
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
    <title>Page de connexion</title>
</head>
<body>
    <!-- Inclure le header -->
    <?php require_once '../includes/partials/_header.php' ?>
    <main class="container">
        <h2 class="mb-5"> Créer un compte sur Find My Dream Homee</h2>
        <form action="" method="POST" class="w-50 bg-secondary m-auto p-5 rounded">
            <div>
                <label for="username" class="form-label">Identifiant</label>
                <input type="text" id="username" name="username" required class="form-control">
            </div>
            <div class="mt-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" maxlength="10" required class="form-control">               
            </div>

            <input type="submit" value="Me connecter" class="btn btn-primary mt-3">

            <!-- Affichage des erreurs s'il y en a -->
            <?php if(isset($errors) && !empty($errors)) : ?>
                <h6>Merci de corriger les erreurs ci-dessous</h6>
                <ul>
                    <?php foreach($errors as $err): ?>
                        <li class="text-white"><?= $err ?></li>
                    <?php endforeach; ?> 
                </ul>
            <?php endif; ?>
        </form>
        <button type="button" class="btn btn-secondary d-block m-auto mt-4"><a href="" class="text-white">Pas encore de compte ? Inscrivez-vous</a></button>
    </main>    
    <!-- Inclure le footer -->
     <?php require_once '../includes/partials/_footer.php' ?>
</body>
</html>