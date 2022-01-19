<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

/**
 * Fonctions
 */

// déclaration de fonction
function add ($x, $y) {
    echo $x + $y;
}
// passer un nombre de paramètres différent du nombre d'arguments dans la signature
// ne provoque pas d'erreur d'exécution
add(4,3,5,5,8);

// déclaration d'un argument avec valeur par défaut
// ceux-ci doivent toujours être à la fin de la signature
function addOrIncrement ($x, $y = 1) {
    echo $x + $y;
}
// Appel avec un seul paramètre
addOrIncrement(4);

// Typage d'un argument
// Avec PHP 7 le typage est intégral (types scalaires autoprisés),
// et l'on peut spécifier un type pour la valeur de retour
function addTable ($x, array $t) {
    $t2 = [];
    foreach ($t as $nombre) {
        $t2[] = $nombre + $x;
    }
    print_r($t2);
}
// Le deuxième appel déclenchera une erreur d'exécution
addTable(4, [1,2,3,4]);
addTable(2,3);

// fonctionnement de l'opérateur 'spread' (reste)
// à partir de PHP >= 5.6
function add ($x, ...$reste) {
    foreach ($reste as $nombre) {
        $x += $nombre;
    }
    echo $x;
}
// PHP reconnaît le nombre variable de paramètres
add(1,2,3);
add(2,4,6,8,10,12,14);


// Passage d'argument par référence
function add (&$x, $y) {
    $x = $x + $y;
}

$a = 10;
$b = 12;
echo add($a, $b);
// La valeur de $a est modifiée par l'appel de 'add'
// Attention ! aux effets de bord, sources de bugs
echo $a;

// Déclaration de valeur de retour
// et sorties multiples
function div ($x, $y) {
    if ($y === 0) {
        return "Pas possible !";
    }
    $r = $x / $y;
    return $r;
}

// Affiche 5
echo div(25,5);
// Sorte prématurément de la fonction et affiche "Pas possible !"
echo div(25,0);


// Noms de fonction dynamiques
// Permettent, comme pour les variables, des indirections
// Dans ce cas, le typage est dynamique, puisque la fonction n'est connue que lors de l'exécution du programme
$f = "div";
echo $f(5,0);
