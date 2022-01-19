<?php

 // $x est récupéré via l'URL : Itératives.php?nombre=32
$x = $_GET['nombre'];


// 1) On cherche à afficher le carré des nombres inférieurs à un nombre passé en paramètre dans l'URL

// while
$i = 0;
while ($i < $x) {
    echo "<p>Le carré de $i vaut ".($i * $i)."</p>";
    $i = $i + 1;
}

// do ... while
$i = 0;
do {
    echo "<p>Le carré de $i vaut ".($i * $i)."</p>";
    $i = $i + 1;
} while ($i < $x);

// for
for ($i = 0; $i < $x ; $i++) {
    echo "<p>Le carré de $i vaut ".($i * $i)."</p>";
}


// 2) On cherche à filter les nombres pairs

// foreach
$t = [1,2,3,4,5,28,453,58792,558741];
foreach ($t as $i) {
    if ($i % 2 == 0) echo "<p>$i est pair</p>";
}


/**
 * Interruptions de boucles
 */

$i = 0;
while (true) {
    if ($i == 5) {
        echo "<p> Caramba !</p>";
        $i += 1;
        // 'continue' interrompt l'exécution de l’itération en cours
        continue;
    }
    echo "<p>Le carré de $i vaut ".($i * $i)."</p>";
    $i += 1;
    if ($i == 20) {
        // 'break' interrompt totalement l'exécution de la boucle
        break;
    }
}
echo "Fin de la boucle";
