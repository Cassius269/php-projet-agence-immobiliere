<?php

// Reprise de la session en cours
session_start();

// Détruire la session revient à se déconnecter
session_destroy();

// Rediriger l'utilisateur à la page d'accueil
header('Location: ../index.php');
exit; // arrêter l'execution du script