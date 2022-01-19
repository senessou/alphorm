<?php

// Initialisation du processus
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';
$db = new PDO($dsn, $user, $password);

// La clef primaire de la tâche à afficher est passée dans l'URL
$id = $_GET['id'];

$statement = $db->prepare(
    "SELECT * FROM `tache` AS `T` JOIN `personne` AS `P` ON `T`.`responsable` = `P`.`id`
     WHERE `T`.`id` = :id");
$statement->execute(['id' => $id]);
$tache = $statement->fetch(PDO::FETCH_OBJ);

// Envoi d'une vue au navigateur
require_once "html/tache.html.php";
