<?php
ini_set('default_charset', 'ISO-8859-1');

/**
 * L'interface mysqli
 */

// 1) On voudrait chercher tous les enregitrements dont la description contient certains mot-clefs (valeur)
$clef = $_GET['clef'];
$valeur = $_GET['valeur'];

// Style "impératif"
// Création d'une ressource liée à la base MySQL
$db = mysqli_init();
// Création d'une ressource liée à la base MySQL
// Connexion à la base
mysqli_real_connect($db, 'localhost', 'root', 'michel', 'tutoriel-mariadb');
// Exécution de la requête en mode FULLTEXT (fouille de texte)
$res = mysqli_query($db,
    "SELECT *, MATCH(`description`) AGAINST('$valeur') AS relevance
     FROM `tache`
     WHERE MATCH (`description`) AGAINST ('$valeur')");
 // Récupération de l'ensemble de résultats (ResultSet) dans un tableau PHP
$data = mysqli_fetch_all($res, MYSQLI_ASSOC);
// Libération de la mémoire et fermeture de la connexion à la base MySQL
mysqli_free_result($res);
mysqli_close($db);


// 2) On voudrait chercher tous les enregitrements de la table 'tache' dont une certaine colonne (clef) a une certaine valeur (valeur)

// Style "objet"
// Création d'une ressource liée à la base MySQL
$db = new mysqli('localhost', 'root', 'michel', 'tutoriel-mariadb');
// Création d'une ressource liée à la base MySQL (un énoncé ou 'statement')
$statement =  $db->stmt_init();
// Préparation de la requête (avec le marqueur ?)
// La commande SELECT
// + liste des colonnes (projection) à extraire
// + FROM + nom de la table source
// + WHERE + expression logique des contraites de sélection
$statement->prepare(
    "SELECT `titre`, `description`
     FROM `tache`
     WHERE $clef = ?");
// Liaison des valeurs aux marqueurs de paramètres
$statement->bind_param("s", $valeur);
// Exécution de la requête
$statement->execute();
$res = $statement->get_result();
// Récupération de l'ensemble de résultats (ResultSet) dans un tableau PHP
$data = $res->fetch_all(MYSQLI_ASSOC);
// Libération de la mémoire et fermeture de la connexion à la base MySQL
$res->free();
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
                    <?php echo $ligne['titre']; ?>
                </td>
                <td>
                    <?php echo $ligne['description']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    </body>
</html>
