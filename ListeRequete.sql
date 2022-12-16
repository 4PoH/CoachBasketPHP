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
WHERE soundex(prenom) = soundex(prenom_saisi)
AND soundex(nom) = soundex(nom_saisi)

