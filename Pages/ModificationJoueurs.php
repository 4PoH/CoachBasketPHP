<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();
    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteJoueurs = $linkpdo->prepare('   SELECT joueur.*, statut.Libelle as Statut
                                            FROM joueur, statut
                                            WHERE joueur.idStatut = statut.idStatut
                                            AND joueur.NumLicence = :p_numLicence');

    $requeteStatut = $linkpdo->prepare('SELECT statut.Libelle FROM statut');
    
    $requeteNombreStatut = $linkpdo->prepare('SELECT count(statut.Libelle) as NB FROM statut');

    ///Liens entre variables PHP et marqueurs
    $requeteJoueurs->bindParam(':p_numLicence', $_POST['Licence']);

    ///Exécution de la requête
    $requeteStatut->execute();
    $requeteJoueurs->execute();
    $requeteNombreStatut->execute();

    ///Résultat de la requete
    $Joueurs = $requeteJoueurs->fetchAll();
    $listeStatut = $requeteStatut->fetchAll();
    $NbStatut = $requeteNombreStatut->fetchAll();
?>

<body>
    <?php
        require '../FonctionPHP/header.php';
    ?>

    <div class="Titre">
        <h1>Modification</h1>
    </div>

    <div class="container">
        <form name=formulaire action="../RequetePHP/UpdateJoueurs.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Numéro de numéro de licence : </p> <input class="CaseEntree" type="text" name="numLicence" value="<?php echo $Joueurs[0][0];?>">
                    <input type="hidden" name="Licence" value="<?php echo $Joueurs[0][0];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom : </p> <input class="CaseEntree" type="text" name="nom" value="<?php echo $Joueurs[0][2];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Prenom : </p> <input class="CaseEntree" type="text" name="prenom" value="<?php echo $Joueurs[0][1];?>">
                </di v>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de naissance : </p> <input class="CaseEntree" type="date" name="dateN" value="<?php echo $Joueurs[0][3];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Taille : </p> <input class="CaseEntree" type="int" name="taille" value="<?php echo $Joueurs[0][5];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poids : </p> <input class="CaseEntree" type="int" name="poids" value="<?php echo $Joueurs[0][6];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poste préféré : </p> <input class="CaseEntree" type="text" name="postePref" value="<?php echo $Joueurs[0][7];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Commentaire : </p> <input class="CaseEntree" type="text" name="commentaire" value="<?php echo $Joueurs[0][8];?>">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Statut : </p>
                    <select name="statut" id="statut">
                        <?php
                            foreach($listeStatut as $statut) {
                                if($statut["Libelle"] == $Joueurs[0]["Statut"]) {
                                    echo "<option value='" . $statut["Libelle"] . "' selected>" . $statut["Libelle"] . "</option>";
                                } else {
                                    echo "<option value='" . $statut["Libelle"] . "'>" . $statut["Libelle"] . "</option>";
                                }
                            }
                        ?>
                    </select>

                </div>
                    <?php require '../FonctionPHP/Image.php'; ?>
                </div>
            
            <div class="DivBoutonFormulaire">
                <input type="hidden" name="Licence" value="<?php echo $Joueurs[0][0];?>">
                <input type="submit" name="Modifier" value="Modifier" class="BoutonFormulaire">
                <a name="Annuler" href="../Pages/Licencies.php">Annuler</a>
            </div>
        </form>
    </div>
</body>