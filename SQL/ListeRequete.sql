/* Obtenir la liste des joueurs blesse*/
SELECT *
FROM joueur
WHERE idStatus = 2

/* Obtenir la liste des joueurs disponible*/
SELECT *
FROM joueur
WHERE idStatus = 1

/* Insérer un nouveau joueur dans la bdd*/
INSERT INTO joueur(NumLicence, Prenom, Nom, DateNaissance, Photo, Taille, Poids, PostePref, Commentaire, idStatus)
    VALUES(:numLicence, :prenom, :nom, :dateN, :photo, :taille, :poids, :postePref, :commentaire, :statut)

/* Rechercher un joueur par n'importe nom et prenom soundex*/
SELECT *
FROM joueur
WHERE NumLicence = NumLicence_saisi
OR soundex(prenom) = soundex(prenom_saisi)
OR soundex(nom) = soundex(nom_saisi)
OR DateNaissance = DateNaissance_saisi
OR Taille = Taille_saisi
OR Poids = Poids_saisi
OR PostePref = PostePref_saisi

/* Insérer un nouvelle rencontre dans la bdd*/
INSERT INTO rencontre(IdRencontre, LieuRencontre, Domicile, DateRencontre, HeureRencontre, ScoreEquipe, ScoreAdverse)
    VALUES(:IdRencontre, :lieuRencontre, :domicile, :dateRencontre, :heureRencontre, :scoreEquipe, :scoreAdverse)

/* Insérer un nouveau status dans la bdd*/
INSERT INTO rencontre(idStatus, libelleStatut)
    VALUES(:idStatus, :libelleStatut)

/* Insérer un nouveau adversaire dans la bdd*/
INSERT INTO adversaire(IdAdversaire, NomAdversaire, LienLogo)
    VALUES(:idAdversaire, :nomAdversaire, :lienLogo)

/* Rechercher un adverdaires grâce son nom*/
SELECT *
from adversaire
WHERE soundex(NomAdversaire) = soundex(nomAdversaire_saisi)

/* Afficher la liste des joueurs ayant une note supérieure à 3 étoiles*/

SELECT *
from joueur, participe
WHERE joueur.numLicence = participe.numLicence
and participe.notation > 3

/* Afficher la liste des matchs dont l'équipe à gagner*/
SELECT *
from rencontre
where scoreEquipe > scoreAdverse

/* Afficher la liste des matchs dont l'équipe à perdu*/
SELECT *
from rencontre
where scoreEquipe < scoreAdverse

/* Afficher la liste des matchs dont l'équipe à fait match nul*/
SELECT *
from rencontre
where scoreEquipe = scoreAdverse

/* Afficher le pourcentage de match gagner au total*/
SELECT sum(*)
from rencontre
where scoreEquipe = scoreAdverse

/* Afficher la liste des status*/
SELECT *
from statut


