<?php

/**
 * Structure conditionnelles
 * On cherche à afficher l'inverse d'un nombre passé en paramètre dans l'URL
 */

// $x est récupéré via l'URL : Conditionnelles.php?nombre=32
$x = $_GET['nombre'];

// if ... else ...
if (is_null($x)) {
    echo "Vous devez fournir un nombre !";
} elseif ($x === 0) {
    echo "Division impossible";
} elseif ($x === 1) {
    echo ((string) $x)." : Identité";
} else {
    echo "L’inverse de x est : ".((string)(1/$x));
}

// Opérateur ternaire == Alternative syntaxique à if ... else ...
echo (($x == 0) ? "Division impossible" : "L’inverse de x est : ".(string)(1/$x)) ;

// switch
switch ($x) {
    case NULL:
        echo "Vous devez ...";
        break;
    case 0:
        echo "Division impossible";
        break;
    case 1:
        echo ((string) $x)." : Identité";
        break;
    case 2:
    default:
        echo "L’inverse de x est : ".(string)(1/$x);
        break;
}
