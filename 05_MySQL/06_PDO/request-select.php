<?php
ini_set('default_charset', 'ISO-8859-1');

/**
 * L'interface PDO
 */

// Choix de la source de données (DSN ou  Data Source Name)
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';

// on recherche les enregistrement pour lesquels un colonne (clef) a une certaine valeur (valeur)
$clef = $_GET['clef'];
$valeur = $_GET['valeur'];

// Connexion à la base de données
$db = new PDO($dsn, $user, $password);
// requête directe
// $data = $db->query("SELECT `titre`, `description` FROM `tache` WHERE $clef = '$valeur'", PDO::FETCH_ASSOC);
// requête préparée
$statement = $db->prepare("SELECT `titre`, `description` FROM `tache` WHERE $clef = :valeur");
$statement->execute(['valeur' => $valeur]);
// On récupére l'ensemble des résultats dans une structure PHP
// Ici FETCH_OBJ indique que l'on souhaite des objets
$data = $statement->fetchAll(PDO::FETCH_OBJ);

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
        <table>
            <thead>
                <td>
                    Titre
                </td>
                <td>
                    Description
                </td>
            </thead>
        <?php foreach ($data as $ligne) { ?>
            <tr>
                <td>
                    <!-- Affichage des propriétés des objets -->
                    <?php echo $ligne->titre; ?>
                </td>
                <td>
                    <?php echo $ligne->description; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    </body>
</html>
