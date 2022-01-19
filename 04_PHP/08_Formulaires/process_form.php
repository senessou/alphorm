<?php

/**
 * Formulaires
 *
 * Nous allons chercher à définir l'identité d'une personne d'après un formulaire d'inscription
 * Ce script est appelé par le formulaire 'form.html'
 */

// On appelle la classe 'Personne'
require_once 'Personne.php';

// Affichage du contenu du tableau super-global $_POST,qui contient les données issues du formulaire
var_dump($_POST);

// Création d'une nouvelle variable de type Personne avec les données correspondantes
$p = new Personne($_POST['prenom'], $_POST['nom']);
$p->hobbies = $_POST['hobby'];
var_dump($p);

// CAs particulier des transferts de fichiers
var_dump($_FILES['fichier']);
$f = $_FILES['fichier'];
// Le fichier est dans un dossier temporaire : il faut le déplacer pour le conserver
define('DIR', './'); // <- Le dossier de destination
move_uploaded_file($_FILES['fichier']['tmp_name'], DIR.$_FILES['fichier']['name']);
