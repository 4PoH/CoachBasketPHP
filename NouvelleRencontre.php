<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="Site.css">
    </head>
    <body>

    <div class="TitrePageRencontre">
        <h1>Nouvelle Rencontre</h1>
    </div>
    
    <div>
        <form name="formu" action="ajoutRencontre.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom équipe adverse : </p> <input class="CaseEntreeFormulaire" type="text" name="numLicence">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Image logo club</p> <input class="CaseEntreeFormulaire" type="text" name="nom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de la rencontre</p> <input class="CaseEntreeFormulaire" type="text" name="prenom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">heure de la rencontre</p> <input class="CaseEntreeFormulaire" type="text" name="dateN"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Notre score</p> <input class="CaseEntreeFormulaire" type="text" name="photo"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Score adverse</p> <input class="CaseEntreeFormulaire" type="int" name="taille"> 
                </div>
            </div>

            <div class="DivBoutonFormulaire">
                <input type="reset" name="" value="Vider" class="BoutonFormulaire">
                <input type="submit" name="" value="Ajouter" class="BoutonFormulaire" onclick="formu.action='/*Mettre la page requete php ici*/'">
            </div>

            </form>
        </div>
        
    </body>
</html>