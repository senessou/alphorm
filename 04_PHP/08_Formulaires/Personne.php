<?php

class Personne {

    public $nom;
    public $prenom;
    public $amis = [];
    public $hobbies = [];

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
