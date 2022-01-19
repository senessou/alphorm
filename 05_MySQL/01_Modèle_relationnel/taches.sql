/**
* Calcul relationnel
*
* Les six grandes opérations sur les relations
*/

-- PROJECTION
-- > sélection d'un sous-ensemble des colonnes d'une relation
SELECT `titre`, `état`
FROM `Tache`;

-- RESTRICTION
-- > sélection d'un sous-ensemble des tuples d'une relation
SELECT *
FROM `Tache`
WHERE `état` = 'a_faire';

-- UNION
-- > agrégation de deux ensembles de tuples (de même schéma) : opération ensembliste
SELECT `titre`, `état` FORM `Tache` WHERE `catégorie` = 'famille'
UNION
SELECT `titre`, `état` FORM `Tache` WHERE id < 3;

-- JOINTURE
-- > fusion sous contrainte de deux relations pour former une nouvelle relation
SELECT *
FROM `Tache`
JOIN `Personne` AS P
ON P.id = p_id;

-- INTERSECTION
-- > intersection de deux ensembles de tuples (de mêmes schéma)
SELECT p_id, titre
FROM `Tache`
WHERE `état` <> 'a_faire'
AND p_id IN (SELECT id FROM `Personne` WHERE `prenom` = 'Albert');

-- DIFFÉRENCE
-- > le premier ensemble de tuple moins les éléments du second
SELECT p_id
FROM `Tache`
WHERE `état` <> 'a_faire'
AND p_id NOT IN (SELECT id FROM `Personne` WHERE `prenom` = 'Albert');
