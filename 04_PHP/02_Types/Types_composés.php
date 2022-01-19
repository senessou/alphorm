<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

/**
 * Tableaux
 */

// Déclaration d'un tableau
$t = [1,2,3,4,5];
var_dump($t);
// Affichage d'un éléemnt du tableau
var_dump($t[3]);
// Ajout d'un élément au tableau (à la fin)
$t[] = 6;
// Modification d'un élément du tableau
$t[1] = 'Great !';
var_dump($t);

// Un tableau associatif
$t = ['un' => 1,'deux' => 2,'trois' => 3,'quatre' => 4,'cinq' => 5];
var_dump($t);
$t['six'] = [7,8,9];
var_dump($t);

/**
 * Objets
 */

// Un objet appartient à une classe
// Les classes nous permettent de définir nos propres types de données
// Il existe une classe PHP par défaut qui est stdClass
$o = new stdClass();
// Les objets ontdes propriétés, assez semblables aus éléments d'un tableau associatif
// (ou aux 'struct' C)
$o->type = 'Objet';
var_dump($o);
// Il est possible de convertir un objet en tableau
var_dump((array) $o);
