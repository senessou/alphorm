<?php

/**
 * Architecture du code d’une application PHP
 */

// Un tableau des opérateurs connus
$signes = ['add' => '+', 'mult' => "*"];

// 1) Valider les données
// Cette étape consiste à normaliser toutes les données fournies par l'utilisateur
// et à déterminer quels traitements devront être appliqués
$op = $_GET['op'];
$arg1 = $_GET['x'];
$arg2 = $_GET['y'];
$op_eligible = in_array($op, ['add', 'mult']);
$has_arguments = ($arg2 !== NULL && $arg2 !== NULL);

// 2) Traitement les données
// On délègue à une bibliothèque particulière le soin de traiter la requête de l'utilisateur
// Cette bibliothèque est externe, comme on le voit
if ($op_eligible) {
    include 'math.php';
    $resultat = $op($arg1, $arg2);
    $signe_op = $signes[$op];
}

// 3) Construre le code HTMl
// On délègue à un 'template' le soin de produire le code HTML qui sera affiché
// dans le navigateur de l'utilisateur
if ($op_eligible) {
    include 'template.php';
} else {
    include 'erreur.php';
}
