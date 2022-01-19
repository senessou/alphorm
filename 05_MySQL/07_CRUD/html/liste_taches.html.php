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
                <td>
                    Catégorie
                </td>
                <td>
                    Urgence
                </td>
                <td>
                    Responsable
                </td>
                <td>
                    --
                </td>
                <td>
                    --
                </td>
            </thead>
        <?php foreach ($data as $ligne) { ?>
            <tr style="vertical-align:top;">
                <td>
                    <a href="fiche_tache.php?id=<?php echo $ligne->clef ?>">
                        <?php echo $ligne->titre; ?>
                    </a>
                </td>
                <td>
                    <?php echo substr($ligne->description,0,100)."..."; ?>
                </td>
                <td>
                    <?php echo $ligne->categorie; ?>
                </td>
                <td>
                    <?php echo $ligne->urgent ? "Urgent" : "Non urgent"; ?>
                </td>
                <td>
                    <?php echo $ligne->prenom." ".$ligne->nom; ?>
                </td>
                <td>
                    <a href="form_modification.php?id=<?php echo $ligne->clef ?>">Modifier</a>
                </td>
                <td>
                    <a href="supprimer_tache.php?id=<?php echo $ligne->clef ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </body>
</html>
