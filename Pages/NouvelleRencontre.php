<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
    </head>
    <body>

    <div class="TitrePageRencontre">
        <h1>Nouvelle Rencontre</h1>
    </div>
    
    <?php $date = date('Y-m-d');?>

    <div>
        <form name="formu" action="ajoutRencontre.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom équipe adverse : </p> <input class="CaseEntree" type="text" name="NomAdversaire">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Image logo club</p> <input class="CaseEntree" type="text" name="LogoAdversaire">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de la rencontre</p> <input class="CaseEntree" type="date" name="DateRencontre" value= <?php echo $date ?>>
                </div>
                <div class="LigneFormulaire">
                        <p class="Libelle">Heure de la rencontre</p> <input class="CaseEntree" type="time" name="HeureRencontre" value="08:00"> 
                    </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Notre score</p> <input class="CaseEntree" type="text" name="photo"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Score adverse</p> <input class="CaseEntree" type="int" name="taille"> 
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