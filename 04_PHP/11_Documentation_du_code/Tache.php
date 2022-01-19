<?php

class Tache {

    /**
     * @var integer $id Identifiant de la tâche */
    public $id;

    /**
     * @var string $titre Titre de la tâche */
    public $titre;

    /**
     * @var string $description Description de la tâche */
    public $prenom;

    /**
     * @var Personne $auteur Personne chargée de réaliser la tâche */
    public $auteur;

    /**
     * @var Date $debuteLe Date de début de la tâche */
    public $debuteLe;

    /**
     * @var Date $finitLe Date de fin de la tâche */
    public $finitLe;

    /**
     * @var integer $statut Etat dans lequel se trouve la tâche */
    public $statut;

    /**
     * @var array $categories Catégories dans lesquelles est rangée la tâche */
    public $categories = [];

    /**
     * Constructeur
     * @param integer $id Identifiant de la tâche
     * @param string $titre Titre de la tâche
     *
     * @example new Tache(125, "Rédiger la documentation")
     */
    public function __construct($id, $titre) {
        $this->id = $id;
        $this->titre = $titre;
    }

    /**
     * Fonction déterminant si une tâche est en retard par rapport à la date de fin
     * @param Date $aujourdhui Date du jour
     * @return boolval
     * @version 1.0
     *
     */
    public function enRetard ($aujourdhui) {
        //
    }

    /**
     * Fonction affectant une tâche à une personne
     * @param Personne $qui Personne à qui est affectée la tâche
     * @return Tache
     * @version 1.0
     *
     */
    public function affecter (Personne $qui) {
        //
    }

    /**
     * Fonction énumérant les tâches non affectées
     *
     * @return Tache[]
     * @version 1.0
     *
     */
    public function nonAffectees (Personne $qui) {
        //
    }

    /**
     * Fonction énumérant les tâches non terminées
     *
     * @return Tache[]
     * @version 1.0
     *
     */
    public function enCours () {
        //
    }
}
