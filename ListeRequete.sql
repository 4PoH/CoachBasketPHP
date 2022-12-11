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

/* Rechercher un joueur par n'importe quel champs*/
SELECT *
FROM joueur
WHERE Prenom = soundex(prenom_saisi)
AND Nom = soundex(nom_saisi)