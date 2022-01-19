<?php

/**
 * Objets
 */

// Le mot-clef 'class' permet de définir de nouveaux types dans les programmes PHP
// en dehors des types scalaires, des tableaux et des types spéciaux
// Ces types sont aussi appelés 'classes'
class Personne {
    // Le type est composé de variables appelées propriétés
    // toujours précédées d'un droit d'accès (public par défaut)
    public $nom;
    public $prenom;
    public $amis = [];
    public $hobbies = [];

    // Le type peut aussi avoir ses propres fonctions appelées méthodes
    // dont __construct, une méthode spéciale appelée 'constructeur'
    public function __construct($prenom, $nom) {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function connait ($p2) {
        if (in_array($p2, $this->amis)) {
            echo "Oui, ".$this->prenom." connaît ".$p2->prenom;
        } else {
            echo "Non";
        }
    }
}

// Déclaration d'une variable de notre nouveau type
$michel = new Personne("Michel", "Dupont");
var_dump($michel);
// Encore une autre
$luc = new Personne("Luc", "Martin");

// Les variables des types (propriétés) sont accessibles avec le symbole ->
// en lecture ou en écriture
$luc->prenom = "Luc";
echo "Le prénom est : ".$luc->prenom;
$luc->amis[] = $michel;

// de même que les appels de fonction
echo ($luc->connait($michel));
