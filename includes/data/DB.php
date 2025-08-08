<?php
// Etablir la connexion à la base de données
try {
$db=new \PDO("mysql:host=localhost:3306;dbname=bdd_annonces_immobilieres;charset=utf8mb4",'cassius','connexion_2024&');
    // var_dump($db);
    // exit;
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die($e->getMessage());
}