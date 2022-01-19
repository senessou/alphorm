<?php

/**
 * Chaînes de caractères
 */

$r = 32;

// Chaîne à guillemets simples
$c1 = 'Ceci n\'est qu\'une chaîne statique';
echo $c1;

// Chaîne à guillemets doubles, avec variable
$c2 = "Ceci est une chaîne \"évaluante\" : \$r vaut $r";
echo $c2;

// Synaxe Heredoc, avec variable
$hdc = <<<SYMBOLE
Ceci est une
chaîne sur plusieurs lignes
avec une variable : $r
SYMBOLE;
echo $hdc;

// Syntaxe Nowdoc
$ndc = <<<'EOF'
Ceci est une $r
chaîne sur 'plusieurs' lignes
> STATIQUE
EOF;
echo $ndc;
