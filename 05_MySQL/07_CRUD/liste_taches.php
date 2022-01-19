<?php

// Data Source Name
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';
$db = new PDO($dsn, $user, $password);

// Syntaxe de la requête SELECT:
// JOIN + nom de la table à fusionner
// ON + criteres permettant de fusionner les enregistrements en tuples
// WHERE 1 pour tout sélectionner (1 == true)
$statement = $db->prepare(
    "SELECT *, `T`.`id` AS clef
     FROM `tache` AS `T`
     JOIN `personne` AS `P` ON responsable = `P`.`id`
     WHERE 1");
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_OBJ);

// On affiche la liste des tâches
require_once "html/liste_taches.html.php";
