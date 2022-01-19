<?php
// Requête = http://exemple.com/page.php?op=mult&x=25&y=37

// Bibliothèque de fonctions
function mult ($x, $y) { return $x * $y; }
function add ($x, $y) { return $x + $y; }

// Traitement des données de la requête (HTTP GET)
$fonction = $_GET['op'];
if (!in_array($fonction, ['mult', 'add'])) {
  die("La fonction demandée n'existe pas");
}
$op1 = isset($_GET['x'])? $_GET['x'] : die("Vous devez donner une valeur à X");
$op2 = isset($_GET['y'])? $_GET['y'] : die("Vous devez donner une valeur à Y");

// Délégation du traitement à la bibliothèque
$résultat = $fonction($op1, $op2);

// Construction de la réponse
$reponse = <<<HTML
<html>
  <head></head>
  <body>
    <p>Le résultat de $op1 $fonction $op2 vaut $resultat</p>
  </body>
</html>
HTML;

// Envoi de la réponse
header('Content-Type', 'text/html');
echo $reponse;
