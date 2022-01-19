<?php

// Initialisation d'une session
session_start();

// La session définit un identifiant de session unique :
// par défaut son nom est PHPSESSID
echo $_SERVER['PHPSESSID'];

// On récupère les informations passes dans l'URL ex_1.php?x=12&y=caramba&z=true
foreach($_GET as $clef => $valeur) {
    if ($valeur == '') continue; // <- délimiteurs de blocs facultatifs en cas d'instruction unique
    // Les informations sont stockées dans le tableau de session super-global $_SESSION
    // Ce tableau est 'persistant' au fil des requêtes
    $_SESSION[$clef] = $valeur;
} 

// On peut définir ses propres cookies avec l'instruction 'setcookie'
// PHPSESSID est transféré automatiquement dans un cookie
$expire = time() + 3600;
setcookie('exemple-cookie', 'Transmis par le code PHP', $expire);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Variables de sessions</title>
    </head>
    <body>
        <h1><?php echo session_id() ?></h1>
        <p>Vos données ont été sauvegardées dans la session</p>
    </body>
</html>
