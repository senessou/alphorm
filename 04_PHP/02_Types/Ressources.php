<?php

/**
 * Ressources
 */

$file = 'http://www.lemonde.fr';
$fp = fopen($file, 'r');
// $fp est une ressource qui pointe vers un fichier (distant dans notre cas)
var_dump($fp);

/**
 * NULL
 */

$a = NULL;
var_dump($a);

$b = 25;
var_dump($b);
// unset efface une variable
unset($b);
var_dump($b);
var_dump(is_null($b));
