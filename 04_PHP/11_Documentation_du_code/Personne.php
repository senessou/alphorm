<?php

class Personne {

    /**
     * @var string $nom Nom de la personne */
    public $nom;

    /**
     * @var string $prenom Prénom de la personne */
    public $prenom;
    /**
     * @var array $amis Liste des amis de la personne */
    public $amis = [];
    /**
     * @var array $amis Liste des centre d'intérêts de la personne */
    public $hobbies = [];

    /**
     * Constructeur
     * @param string $prenom Prénom de la personne
     * @param string $nom Nom de la personne
     *
     * @example connaît(new Personne('Michel', 'Martin'))
     */
    public function __construct($prenom, $nom) {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    /**
     * Fonction déterminant si une personne connaît une autre Personne
     *
     * @param Personne $p2 La personne connue (ou non)
     *
     * @return boolval
     *
     * @version 1.0
     *
     * @example connaît(new Personne('Michel', 'Martin'))
     */
    public function connait ($p2) {
        if (in_array($p2, $this->amis)) {
            echo "Oui, ".$this->prenom." connaît ".$p2->prenom;
            return true;
        } else {
            echo "Non";
            return false;
        }
    }
}
