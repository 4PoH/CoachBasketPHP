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

/* Afficher le nombre de match gagné au total*/
SELECT count(IdRencontre)
from rencontre
where scoreEquipe > scoreAdverse

/* Afficher le nombre de match perdue au total*/
SELECT count(IdRencontre)
from rencontre
where scoreEquipe < scoreAdverse

/* Afficher la liste des status*/
SELECT statut.libelleStatut
from statut

/* Supprimer un joueur à partir son numéro de licence*/
delete from joueur where numLicence = numLicence_saisi

/* Supprimer un joueur à partir son nom*/
delete from joueur where soundex(nom) = soundex(nom_saisi)

/* mettre à jour le poste prefere à partir son numéro de license*/
UPDATE joueur
SET PostePref = PostePref_saisi
where NumLicence = numLicence_saisi

/* mettre à jour le poste prefere à partir son nom*/
UPDATE joueur
SET PostePref = PostePref_saisi
where soundex(nom) = soundex(nom_saisi)

/* Afficher la moyenne du nombre de match jouer pour un joueur donné*/
SELECT avg(rencontre.IdRencontre)
from rencontre, participer, joueur
WHERE rencontre.IdRencontre = participer.IdRecontre
AND participer.Titulaire = 1
AND joueur.Nom = nom_saisi

/* Afficher la moyenne d'étoiles des joueurs pour un match donné*/
SELECT avg(notation)
from participe, rencontre
where participe.IdRecontre = rencontre.IdRecontre
and LibelleRencontre = libeller_saisi

/* metter a jour le statut d'un joueur donné*/
UPDATE joueur
SET id_statut = statut_saisi
where numLicence = numLicence_saisi

/* metter a jour le statut d'un joueur donné*/
UPDATE joueur
SET id_statut = statut_saisi
where numLicence = numLicence_saisi


/*selectionner les joueurs qui ont participer à des match trié par la titularisation*/
select joueur.nom, joueur.NumLicence, joueur.PostePref, participer.Titulaire, adversaire.nom as nomAdversaire, rencontre.IDRencontre
from joueur, participer, rencontre, adversaire
where joueur.NumLicence = participer.NumLicence 
and participer.IdRencontre = rencontre.IdRencontre 
and rencontre.idAdversaire = adversaire.idAdversaire
and rencontre.IDRencontre = '1' /*exemple */
order by participer.Titulaire DESC;


create or REPLACE function calcul_p_rencontre(idR in rencontre.IDRencontre%type ) return number is
nbv number;
nbt number;
begin
select COUNT(*) into nbv
from rencontre
where ScoreEquipe > ScoreAdverse

SELECT COUNT(*) INTO nbt
from rencontre

RETURN nbv*100/nbt
end;

--Pourcentage de victoire de l'équipe--
SELECT round(count(ScoreEquipe)*100/(select COUNT(*) from rencontre)) as pourcentage
from rencontre
where ScoreEquipe > ScoreAdverse

--Pourcentage de match perdu par l'équipe--
SELECT round(count(ScoreEquipe)*100/(select COUNT(*) from rencontre)) as pourcentage
from rencontre
where ScoreEquipe < ScoreAdverse

--Moyenne de point marqué par l'équipe durant la saison--
SELECT round(avg(ScoreEquipe)) from rencontre

--Récuperer le nombre de match titularise des joueurs dans l'ordre croisant
SELECT participer.NumLicence, joueur.Nom, joueur.Prenom, COUNT(participer.Titulaire) as nbtitularisation
from participer, joueur
GROUP by participer.NumLicence, joueur.Nom, joueur.Prenom
ORDER by participer.Titulaire DESC 

--mise jour information d'un joueur donnné à partir de son id--
UPDATE joueur
set 
where joueur.licence = :numLicence