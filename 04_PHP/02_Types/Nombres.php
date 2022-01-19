<?php

/**
 * Entiers
 */

$x = 12345;     // Notation décimale
$y = 0x125FA;   // Notation hexadécimale
$z = 0b1010;    // Notation binaire

$r = $x + $y + $z;
echo $r;

//  Entier max
echo PHP_INT_MAX;

/**
 * Nombres réels (à virgule flottante)
 */

// Un entier supérieur à PHP_INT_MAX est automatiquement transformé en float
var_dump(PHP_INT_MAX * 2);

// Une opération impiquant au moins un float donne un résultat de type float
$r1 = 3.256;
$r2 = 58325;
var_dump($r1 * $r2);

// Les opérations impossibles sur les nombres rendent la valeur NAN (Not A Number)
var_dump(acos(8));
