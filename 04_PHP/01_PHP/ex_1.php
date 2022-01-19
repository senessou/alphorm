<!DOCTYPE html>
<?php $x = 10 ; 
$chaine = <<<EOF
maman va au marcher 
avec sa fille et 
emprute un vehicule 
EOF;

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Première page</title>
    </head>
    <body>
        <?php $y = 50 ?>
        <h1>Première page</h1>
        <p>
            <!-- Insertion de code PHP à l'intérieur d'ue page HTML -->
            <?php echo "Le résultat de $x + $y : " ?>
        </p>
        <p>
            <!-- Le code PHP est inséré là où la donnée doit apparaître dans la page -->
            <?php echo ($x+$y) ?>
        </p>
    </body>
</html>
