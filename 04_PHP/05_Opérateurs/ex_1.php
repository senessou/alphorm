<?php

// Données d'entrée
$x = 0;
// On peut définir des constantes en PHP avec 'define'
define('A', 0);

// Associativité des opérateurs
if ($z = $x + (A * 32)) {
    echo $z;
} else {
    echo "Echec";
};

// L'opérateur alias (&) qui permet de lier deux symboles de variables
// cf. le passage d'argument par référence pour les fonctions
$y = &$x;
$x = 5012;
echo $y;
// Toujours false, naturelleemnt !
$u = !$x and $y;
