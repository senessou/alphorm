<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Description d'une tâche</title>
    </head>
    <body>
        <h1><?php echo $tache->titre ?></h1>
        <p style="margin-top:0; font-style:italic; font-size: 1rem;">
            <?php echo $tache->categorie." | ".($tache->urgent ? "urgent" : "non urgent") ?>
        </p>
        <div style="margin:1rem;padding:1rem;border:1px solid #EEE;">
            <?php echo $tache->description ?>
        </div>
        <div class="">
            Pour : <?php echo $tache->prenom." ".$tache->nom ?>
        </div>
    </body>
</html>
