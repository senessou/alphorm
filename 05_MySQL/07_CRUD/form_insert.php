<?php

// Initialisation du processus
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';
$db = new PDO($dsn, $user, $password);

// Réception de formulaire
if (!empty($_POST)) {
    $is_ok = true;
    // Validation des données
    if (is_null($_POST['responsable'])) {
        $is_ok= false;
    }

    if ($is_ok) {
        $statement = $db->prepare(
        'INSERT INTO `tache` (titre, description, categorie, urgent, responsable)
         VALUES (:titre, :description, :categorie, :urgent, :responsable)');
        $statement->execute([
            ':titre' => $_POST['titre'],
            ':description' => $_POST['description'],
            ':categorie' => $_POST['categorie'],
            ':urgent' => (integer) $_POST['urgent'],
            ':responsable' => (integer) $_POST['responsable'],
        ]);

        require_once "liste_taches.php";
    }
// Afficher le formulaire
} else {
    // Récupération des données
    $personnes = $db->query("SELECT `id`, `prenom`, `nom` FROM `personne` WHERE 1", PDO::FETCH_ASSOC);
    $processor = array_pop(explode('/', __FILE__));

    // Envoi d'une vue au navigateur
    require_once "html/form_tache.html.php";
}
