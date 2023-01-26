<?php
    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteRencontre = $linkpdo->prepare(' SELECT rencontre.*, adversaire.nom FROM rencontre, adversaire WHERE rencontre.idAdversaire = adversaire.IdAdversaire AND rencontre.IdRencontre = :p_IdRencontre');

    $requeteAdversaire = $linkpdo->prepare('SELECT Adversaire.nom FROM Adversaire');
        
    $requeteNombreAdversaire = $linkpdo->prepare('SELECT count(Adversaire.nom) as NB FROM Adversaire');

    ///Liens entre variables PHP et marqueurs
    $requeteRencontre->bindParam(':p_IdRencontre', $_POST['IdRencontre']);

    ///Exécution de la requête
    $requeteRencontre->execute();
    $requeteAdversaire->execute();
    $requeteNombreAdversaire->execute();

    ///Résultat de la requete
    $Rencontre = $requeteRencontre->fetchAll();
    $listeAdversaire = $requeteAdversaire->fetchAll();
    $NbAdversaire = $requeteNombreAdversaire->fetchAll();
    //var_dump($Rencontre);
?>

<body>
    <?php
        require '../FonctionPHP/header.php';
    ?>

    <div class="Titre">
        <h1>Modification</h1>
    </div>

    <div class="container">
        <form name=formulaire action="../RequetePHP/UpdateRencontre.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Lieu de rencontre : </p> <input class="CaseEntree" type="text" name="LieuRencontre" value="<?php echo $Rencontre[0][1];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Domicile : </p>
                    <input class="CaseEntree" type="checkbox" name="Domicile" <?php if($Rencontre[0][1] = 1){ echo 'checked="checked"'; } ?> value="1" onchange="this.value = this.checked ? 1 : 0">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de rencontre : </p> <input class="CaseEntree" type="date" name="DateRencontre" value="<?php echo $Rencontre[0][3];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Heure de rencontre : </p> <input class="CaseEntree" type="time" name="HeureRencontre" value="<?php echo $Rencontre[0][4];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Notre score</p> <input class="CaseEntree" type="text" name="ScoreEquipe" value="<?php echo $Rencontre[0][5];?>"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Score adverse</p> <input class="CaseEntree" type="text" name="ScoreAdverse" value="<?php echo $Rencontre[0][6];?>"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Adversaire : </p>
                    <select name="Adversaire" id="Adversaire">
                        <?php
                            foreach($listeAdversaire as $Adversaire) {
                                if($Adversaire["nom"] == $Rencontre[0][8]) {
                                    echo "<option value='" . $Adversaire["nom"] . "' selected>" . $Adversaire["nom"] . "</option>";
                                } else {
                                    echo "<option value='" . $Adversaire["nom"] . "'>" . $Adversaire["nom"] . "</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <?php require '../FonctionPHP/Image.php'; ?>
                </div>
            
            <div class="DivBoutonFormulaire">
                <input type="hidden" name="IdRencontre" value="<?php echo $Rencontre[0][0];?>">
                <input type="submit" name="Modifier" value="Modifier" class="BoutonFormulaire">
                <a name="Annuler" href="../Pages/Licencies.php">Annuler</a>
            </div>
        </form>
    </div>
</body>