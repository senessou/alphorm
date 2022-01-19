<?php

// Initialisation du processus
$dsn = 'mysql:dbname=tutoriel-mariadb;host=localhost';
$user = 'root';
$password = 'michel';
$db = new PDO($dsn, $user, $password);

// 1) Le script reçoit un formulaire rempli (methode HTTP POST)
if (!empty($_POST)) {
    $is_ok = true;
    // Validation des dpnnées
    if (is_null($_POST['responsable'])) {
        $is_ok= false;
    }

    if ($is_ok) {
        // Syntaxe de la commande UPDATE
        // SET + liste de couples colonne = valeur, les colonnes dont les vaeurs osnt à modifier
        // WHERE critères de sélection des enregistrements à modifier, ici c'est la valeur de la clef primaire
        $statement = $db->prepare(
        "UPDATE `tache`
         SET titre = :titre, description = :description, categorie = :categorie, urgent = :urgent, responsable = :responsable
         WHERE `id` = :id");
        //  Exécution de la requête préparée
        $statement->execute([
            'id' => $_POST['id'],
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'categorie' => $_POST['categorie'],
            'urgent' => (integer) $_POST['urgent'],
            'responsable' => (integer) $_POST['responsable'],
        ]);

        // Retour à la liste des tâches
        require_once "liste_taches.php";
    }

// 2) Si la méthode HTTP est GET, alors il faut juste afficher le formulaire avec les données
} else {
    $id = $_GET['id'];
    // Récupération des données de la tâche recherchée
    $statement = $db->prepare("SELECT * FROM `tache` WHERE `id` = :id");
    $statement->execute(['id' => $id]);
    $tache = $statement->fetch(PDO::FETCH_ASSOC);
    // Récupération de la liste des personnes que l'on veut afficher dans un menu déroulant
    $personnes = $db->query("SELECT `id`, `prenom`, `nom` FROM `personne` WHERE 1", PDO::FETCH_ASSOC);
    // le script qui doir traiter le formulaire est le même que celui-ci :o)
    $processor = array_pop(explode('/', __FILE__));

    // Envoi d'une vue au navigateur
    require_once "html/form_tache.html.php";
}
