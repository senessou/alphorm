<?php
// ini_set('default_charset', 'ISO-8859-1');

/**
 * L'interface PDO
 */

// Choix de la source de données (DSN ou  Data Source Name)
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';

// On souhaite importer d'un seul coup toute une série d'enregistrements
// Mais si une erreur se produit, on voudrait remettre la base dans l'état ou elle était
// avant le début de l'import.
// C'est ce qu'on appelle un séquence critique : c'est tout ou rien.

// Les tâches à importer
// Il y a une erreur : 'responsable' ne peut avoir NULL comme valeur
$taches = [
    ['Ranger la maison', '', 'personnel', 1, 1 ],
    ['Tests appli web', '', 'professionnel', 0, NULL]
];

$db = new PDO($dsn, $user, $password);
// Initialisation de la transaction
// La base de connées passe en mode « commit manuel »
$db->beginTransaction();
// Préparation de la requête
$statement = $db->prepare('INSERT INTO `tache` (titre, description, categorie, urgent, responsable) VALUES (?, ?, ?, ?, ?)');
// A priori le résultat est correct
$is_valid = true;
// Début de la transaction
foreach ($taches as $t) {
    $is_valid = $statement->execute($t);
    // Si une requête se passe mal, je décide d'annuler la transaction entière avec rollback()
    if (!$is_valid) {
        $db->rollback();
        break;
    }
}
// Si toutes les requêtes ont été des succès, je valide la transaction avec commit()
if ($is_valid) $db->commit();

// La base de données repasse maintenant en mode auto-commit
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
        <?php if ($is_valid) {
        ?>
        <h1>Les enregistrements ont bien été ajoutés à la base</h1>
        <table>
            <thead>
                <td>Tâche</td>
                <td>Catégorie</td>
            </thead>
            <?php foreach ($taches as $ligne) { ?>
                <tr>
                    <td><?php echo $ligne[0]; ?></td>
                    <td><?php echo $ligne[2]; ?></td>
                </tr>
                <?php } ?>
            </table>
        <?php
    } else {
        ?>
        <h1>Une erreur s'est produite pendant la transaction</h1>
        <h2>La base de données a été restaurée dans son état initial</h2>
        <?php
    }
    ?>
    </body>
</html>
