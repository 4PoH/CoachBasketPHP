<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();
    
    require '../FonctionPHP/connBDD.php';

    $date = date('Y-m-d');

    ///Préparation des requêtes
    $reqStatut = $linkpdo->prepare('SELECT statut.Libelle FROM statut;');
    $reqNb = $linkpdo->prepare('SELECT count(statut.Libelle) as NB FROM statut;');

    ///Exécution de la requête
    $reqStatut->execute();
    $reqNb->execute();

    $listeStatut = $reqStatut->fetchAll();
    $NbStatut = $reqNb->fetchAll();
?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Consultation</title>
        <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
    </head>
    <body>
        
        <?php require '../FonctionPHP/header.php'; ?>


        <div class="TitrePageConsultation">
            <h1>Consultation</h1>
        </div>

        <form name="formu" action="ajoutJoueur.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Numéro de licence : </p> <input class="CaseEntree" type="text" name="numLicence">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom : </p> <input class="CaseEntree" type="text" name="nom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Prenom : </p> <input class="CaseEntree" type="text" name="prenom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de naissance : </p> <input class="CaseEntree" type="date" name="dateN"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Taille : </p> <input class="CaseEntree" type="int" name="taille"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poids : </p> <input class="CaseEntree" type="int" name="poids">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poste prefere : </p> <input class="CaseEntree" type="text" name="postePref"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Statut : </p>
                    <select name="statut">
                        <option value="">-- Choisir un statut --</option>
                        <?php $colonne = 0; for ($Statut = 0; $Statut < $NbStatut[0][0]; $Statut++){
                            $valeur = $listeStatut[$Statut][$colonne];
                            echo "<option> $valeur </option>";
                            }?>
                    </select>
                </div>
            </div>

            <div class="DivBoutonFormulaire">
                <input type="reset" name="" value="Vider" class="BoutonFormulaire">
                <input type="submit" name="" value="Rechercher" class="BoutonFormulaire" onclick="formu.action='../Pages/RechercheJoueur.php'">
                <input type="submit" name="" value="Modifier" class="BoutonFormulaire">
                <input type="submit" name="" value="Supprimer" class="BoutonFormulaire">
            </div>
        </form>
    </body>
</html>