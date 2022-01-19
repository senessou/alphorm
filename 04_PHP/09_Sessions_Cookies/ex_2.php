<?php
// La session doit être réouverte à chaque requête
session_start();
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Variables de session</title>
    </head>
    <body>
        <!-- Affichage de l'identifiant de session -->
        <h1>Liste des données sauvegardées : <?php echo session_id() ?></h1>
        <hr />
        <table>
            <!-- Affichage du contenu du tableau de session -->
            <?php foreach($_SESSION as $clef => $valeur) { ?>
                <tr>
                    <td>
                        <?php echo $clef ?>
                    </td>
                    <td>
                        <?php echo $valeur ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <hr />
        <table>
            <!-- Affichage des cookies transmis par le navigateur
                 contenus dans lableau super-global $_COOKIE -->
            <?php foreach($_COOKIE as $clef => $valeur) { ?>
                <tr>
                    <td>
                        <?php echo $clef ?>
                    </td>
                    <td>
                        <?php echo $valeur ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
