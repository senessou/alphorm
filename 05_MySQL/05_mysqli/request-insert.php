<?php
ini_set('default_charset', 'ISO-8859-1');

/**
 * L'interface mysqli
 */

// 1) On souhaite ajouter un nouvel enregistrement dans la table 'tache'

// Style "objet"
$db = new mysqli('localhost', 'root', 'michel', 'tutoriel-mariadb');
$statement =  $db->stmt_init();
// La commande INSERT
// + INTO + nom de la table
// + liste des colonnes entre parenthèses, séparées par une virgule
// + VALUES + liste des valeurs associées à chaque colonnes
// Ici la requête est préparée, donc les valeurs sont des marqueurs de paramètres
$data = $db->prepare(
'INSERT INTO `tache` (titre, description, categorie, urgent)
 VALUES (?, ?, ?, ?)');
// Liaison des valeurs aux marqueurs de parametres
$statement->bind_param("sssi", $_POST['titre'], $_POST['description'], $_POST['categorie'], (integer) $_POST['urgent']);
$statement->execute();
// Fermeture de la connexion
$statement->close();
$db->close();

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
        <h1>Une nouvelle tâche est eenregistrée dans votre base de données</h1>
    </body>
</html>
