<?php
// ini_set('default_charset', 'ISO-8859-1');

/**
 * L'interface PDO
 */

// Choix de la source de données (DSN)
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';

// Connexion à la base de données
$db = new PDO($dsn, $user, $password);
// Préparation de la requête d'insertion
// avec des marqueurs nommés :<nomDuMarqueur>
$statement->prepare(
    'INSERT INTO `tache` (titre, description, categorie, urgent, responsable)
     VALUES (:titre, :description, :categorie, :urgent, 1)');
//Exécution de la requête (les valeurs sont passées dans un tableau en argument)  
$statement->execute([
    ':titre' => $_POST['titre'],
    ':description' => $_POST['description'],
    ':categorie' => $_POST['categorie'],
    ':urgent' => (integer) $_POST['urgent'],
]);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
            table {
                margin: 1rem auto;
                width: 80vw;
            }
            thead {
                background-color: #333;
                color: #FFF
            }
            td {
                padding: 1rem;
            }
        </style>
    </head>
    <body>
        <h1>Une nouvelle tâche est enregistrée dans votre base de données</h1>
    </body>
</html>
