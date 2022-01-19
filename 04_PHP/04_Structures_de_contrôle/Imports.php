<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

// script exécuté deux fois;
include "pairs.php";
include "pairs.php";
//  ou
include_once "pairs.php";
include "pairs.php";

// script exécuté une seule fois
include "pairs.php";
include_once "pairs.php";

// fichier inexistant : simple avertissement
include_once "pairs_2.php";
include "pairs.php";

// script exécuté deux fois;
require "pairs.php";
require "pairs.php";
//  ou
require_once "pairs.php";
require "pairs.php";

// script exécuté une seule fois
require "pairs.php";
require_once "pairs.php";

// fichier inexistant : erreur fatale
require_once "pairs_2.php";
require "pairs.php";
