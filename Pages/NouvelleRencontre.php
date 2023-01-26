<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();
    require '../FonctionPHP/connBDD.php';
    $date = date('Y-m-d');

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteAdversaire = $linkpdo->prepare('SELECT adversaire.nom FROM Adversaire');
    $requeteNombreAdversaire = $linkpdo->prepare('SELECT count(Adversaire.nom) as NB FROM Adversaire');

    ///Exécution de la requête
    $requeteAdversaire->execute();
    $requeteNombreAdversaire->execute();

    ///Résultat de la requete
    $listeAdversaire = $requeteAdversaire->fetchAll();
    $NbAdversaire = $requeteNombreAdversaire->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Nouvelle Rencontre</title>
        <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
    </head>
    <body>

    <?php require '../FonctionPHP/header.php'; ?>

    <div class="TitrePageRencontre">
        <h1>Nouvelle Rencontre</h1>
    </div>

    <div class="Corps">
        <form name="formu" action="../RequetePHP/InsertionRencontre.php" method="post">
            <div class="Formulaire">
            <div class="LigneFormulaire">
                    <p class="Libelle">Adversaire : </p>
                    <select name="Adversaire">
                        <option value=""> -- Choisir un adversaire -- </option>
                        <?php $colonne = 0; for ($Adversaire = 0; $Adversaire < $NbAdversaire[0][0]; $Adversaire++){
                            $valeur = $listeAdversaire[$Adversaire][$colonne];
                            echo "<option> $valeur </option>";
                            } ?>
                    </select>
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Lieu de la rencontre</p> <input class="CaseEntree" type="text" name="LieuRencontre">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Domicile</p>
                    <input class="CaseEntree" type="checkbox" name="Domicile" value="1" onchange="this.value = this.checked ? 1 : 0">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de la rencontre</p> <input class="CaseEntree" type="date" name="DateRencontre" value= <?php echo $date ?>>
                </div>
                <div class="LigneFormulaire">
                        <p class="Libelle">Heure de la rencontre</p> <input class="CaseEntree" type="time" name="HeureRencontre" value="08:00"> 
                    </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Notre score</p> <input class="CaseEntree" type="int" name="ScoreEquipe"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Score adverse</p> <input class="CaseEntree" type="int" name="ScoreAdverse"> 
                </div>
            </div>

            <div class="DivBoutonFormulaire">
                <input type="reset" name="Vider" value="Vider" class="BoutonFormulaire">
                <input type="submit" name="Ajouter" value="Ajouter" class="BoutonFormulaire">
            </div>
        </form>
    </div>
        
    </body>
</html>