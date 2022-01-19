<?php

// Data Source Name
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';
$db = new PDO($dsn, $user, $password);

// On cherche à afficher toutes les tâches d'une certaine catégorie
// La valeur est passée dans l'URL
$valeur = $_GET['valeur'];

// Syntaxe de la requête SELECT:
// JOIN + nom de la table à fusionner
// ON + criteres permettant de fusionner les enregistrements en tuples
$statement = $db->prepare(
    "SELECT *, `T`.`id` AS clef
     FROM `tache` AS `T`
     JOIN `personne` AS `P` ON responsable = `P`.`id`
     WHERE categorie = :critere");
$statement->execute(['critere' => $valeur]);
$data = $statement->fetchAll(PDO::FETCH_OBJ);

// On affiche la liste des tâches sélectionnées
require_once "html/liste_taches.html.php";
