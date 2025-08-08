<?php

function getPropertyTypeId(string $propertyTypeName) {
    global $db; // rendre locale l'instance de connexion à la base de données (PDO)

    // Récupérer l'id du type de propriété choisi
    try {
        // Définir la requête SQL
        $sql = "SELECT id
                FROM property_type
                WHERE name = :propertyType";

        // Préparer la requête avec des marqueurs nommés
        $preparedQuery = $db->prepare($sql);

        // Executer la requête avec les marqueurs nommées
        $preparedQuery->execute([
            'propertyType' => $propertyTypeName
        ]);

        $data = $preparedQuery->fetch(PDO::FETCH_ASSOC);

        if($data){
            return $data['id'];
        }else {
            throw new PDOException('Aucune donnée trouvée correspondante');
        }

    }catch(PDOException $e){
        die($e->getMessage());
    }
}


function getTransactionTypeId(string $transactionTypeName) {
    global $db; // rendre locale l'instance de connexion à la base de données (PDO)

    // Récupérer l'id du type de propriété choisi
    try {
        // Définir la requête SQL
        $sql = "SELECT id
                FROM transaction_type
                WHERE name = :transactionType";

        // Préparer la requête avec des marqueurs nommés
        $preparedQuery = $db->prepare($sql);

        // Executer la requête avec les marqueurs nommées
        $preparedQuery->execute([
            'transactionType' => $transactionTypeName
        ]);

        $data = $preparedQuery->fetch(PDO::FETCH_ASSOC);

        if($data){
            return $data['id'];
        }else {
            throw new PDOException('Aucune donnée trouvée correspondante');
        }

    }catch(PDOException $e){
        die($e->getMessage());
    }
}


