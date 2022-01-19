<?php

/**
 * Transtypage
 */

// Conversion en chaîne de caractères
$r1 = 32;
var_dump((string) $r1);
// Conversion en booléen
var_dump((bool) $r1);
// Conversions en entier
$c2 = "Ceci est une chaîne \"évaluante\" : \$r1 vaut $r1";
var_dump((integer) $r1);
var_dump((integer) $c2);
