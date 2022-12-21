<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Consultation</title>
        <link rel="stylesheet" href="Site.css">
    </head>
 <body>
    <div class="TitrePageConsultation">
        <h1>Consultation</h1>
    </div>
    
    <div>
        <form name="formu" action="ajoutJoueur.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Numéro de numéro de licence : </p> <input class="CaseEntreeFormulaire" type="text" name="numLicence">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom : </p> <input class="CaseEntreeFormulaire" type="text" name="nom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Prenom : </p> <input class="CaseEntreeFormulaire" type="text" name="prenom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de naissance : </p> <input class="CaseEntreeFormulaire" type="text" name="dateN"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Photo : </p> <input class="CaseEntreeFormulaire" type="text" name="photo"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Taille : </p> <input class="CaseEntreeFormulaire" type="int" name="taille"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poids : </p> <input class="CaseEntreeFormulaire" type="int" name="poids">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poste prefere : </p> <input class="CaseEntreeFormulaire" type="text" name="postePref"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Commentaire : </p> <input class="CaseEntreeFormulaire" type="text" name="commentaire">
                </div>
                <div class="LigneFormulaire">
                        <p class="Libelle">Statut : </p> <select class="CaseEntreeFormulaire" name="statut"> 
                        <option>Disponible</option>
                        <option>Blesse(e)</option>
                        <option>En vacance</option>
                    </select>
                </div>
            </div>

            <div class="DivBoutonFormulaire">
                <input type="reset" name="" value="Vider" class="BoutonFormulaire">
                <input type="submit" name="" value="Ajouter" class="BoutonFormulaire" onclick="formu.action='InsertionJoueur.php'">
                <input type="submit" name="" value="Rechercher" class="BoutonFormulaire">
                <input type="submit" name="" value="Modifier" class="BoutonFormulaire">
                <input type="submit" name="" value="Supprimer" class="BoutonFormulaire">
            </div>

            </form>
        </div>
    </body>
</html>