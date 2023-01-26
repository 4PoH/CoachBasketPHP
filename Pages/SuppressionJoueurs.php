<?php

    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteJoueurs = $linkpdo->prepare('   SELECT joueur.*, statut.Libelle AS Statut
                                            FROM joueur, statut
                                            WHERE joueur.idStatut = statut.idStatut
                                            AND joueur.NumLicence = :p_numLicence
                                ');

    $requeteStatut = $linkpdo->prepare('SELECT statut.Libelle FROM statut');
    
    $requeteNombreStatut = $linkpdo->prepare('SELECT count(statut.Libelle) AS NB FROM statut');

    ///Liens entre variables PHP et marqueurs
    $requeteJoueurs->bindParam(':p_numLicence', $_POST['Licence']);

    ///Exécution de la requête
    $requeteStatut->execute();
    $requeteJoueurs->execute();
    $requeteNombreStatut->execute();

    ///Résultat de la requete
    $listeStatut = $requeteStatut->fetchAll();
    $Joueurs = $requeteJoueurs->fetchAll();
    $NbStatut = $requeteNombreStatut->fetchAll();
?>

<body>
    <?php
        require '../FonctionPHP/header.php'
    ?>

    <div class="Titre">
        <h1>Supression</h1>
    </div>

    <div class="container">
        <form name=formulaire action="../RequetePHP/DeleteJoueurs.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Numéro de numéro de licence : <?php echo $Joueurs[0][0];?></p>
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom : <?php echo $Joueurs[0][2];?></p>
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Prenom : <?php echo $Joueurs[0][1];?></p> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de naissance : <?php echo $Joueurs[0][3];?></p> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Taille : <?php echo $Joueurs[0][5];?></p> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poids : <?php echo $Joueurs[0][6];?></p> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poste préféré : <?php echo $Joueurs[0][7];?></p> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Commentaire : <?php echo $Joueurs[0][8];?></p> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Statut : <?php echo $Joueurs[0][9];?></p>
                </div>
                <div>
                    <img src="<?php echo $Joueurs[0][4];?>" alt="Photo de <?php echo($Joueurs[0][2].' '.$Joueurs[0][1]); ?>">
                    <?php require '../FonctionPHP/Image.php'; ?>
                </div>
            </div>

            <div class="DivBoutonFormulaire">
                <input type="hidden" name="Licence" value="<?php echo $Joueurs[0][0];?>">
                <input type="submit" name="Supprimer" value="Supprimer" class="BoutonFormulaire">
                <a name="Annuler" href="../Pages/Licencies.php">Annuler</a>
            </div>
        </form>
    </div>
</body>