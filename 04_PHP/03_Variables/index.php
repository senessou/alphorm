<?php

$x = 0;
$y_12_frg = "Variable globale";
$unNomdeVariableAssezLong = "Indirection de la valeur de la variable";
$_12_var = false;

//
// var_dump($_SERVER);

// function f () {
//     global $x;
//     $x = 3;
//     $z = false;
// }

// if (true) {
//     $x = 3;
// }

// f();
// var_dump($x);

// include("script.php");
//
// echo $script_z;

$var = 'unNomdeVariableAssezLong';
//
echo $$var;
