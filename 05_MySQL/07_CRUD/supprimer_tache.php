<?php

// Initialisation
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';
$db = new PDO($dsn, $user, $password);

// L'URL nous fournit la clef primaire de l'enregistrement à effacer
$clef = $_GET['id'];

// Syntaxe de la commande DELETE
// FROM + nom de la table cible
// WHERE + critères de sélection des enregistrements à effacer : ici selon la valeur de la clef primaire
$statement = $db->prepare(
    "DELETE
     FROM `tache`
     WHERE `id` = :id");
$statement->execute(['id' => $clef]);

// Retour à l'affichage de la liste des tâches
include "liste_taches.php";
