<?php

// Le point d'accès unique de l'application PHP
// Cela permet d'alléger les URL, de les rendres plus siginifiantes

// Il est nécessaire mettre en tampon le code produit par l'application
// sinon le navigateur affiche le code HTML comme du texte
ob_start();
// Ici, index.php set juste à 'masquer' le script précédent, mais exécute les mêmes traitements
include 'page.php';
ob_end_flush();
