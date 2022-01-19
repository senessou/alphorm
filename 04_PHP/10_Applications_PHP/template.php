<!DOCTYPE html>
<!-- Le squelette HTML/PHP affiché en cas de succès -->
<html>
    <head>
        <meta charset="utf-8">
        <title>Résultat de l'opération</title>
    </head>
    <body>
        <h1>Nous avons effectué une : <?php echo $op ?></h1>
        <hr/>
        <h2>
            <!-- Intégration des données calculée par la bibliothèque 'math.php' -->
            <?php echo "$arg1 $signe_op $arg2 = $resultat" ?>
        </h2>
    </body>
</html>
