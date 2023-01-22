<?php

    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteJoueurs = $linkpdo->prepare('   SELECT joueur.*, statut.Libelle as Statut
                                            FROM joueur, statut
                                            WHERE joueur.idStatut = statut.idStatut
                                            AND joueur.NumLicence = :p_numLicence
                                ');

    $requeteStatut = $linkpdo->prepare('SELECT statut.Libelle FROM statut');
    
    $requeteNombreStatut = $linkpdo->prepare('SELECT count(statut.Libelle) as NB FROM statut');

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
        require '../FonctionPHP/connBDD.php';
        require '../FonctionPHP/header.php'
    ?>

    <div class="Titre">
        <h1>Supression</h1>
    </div>

    <div class="container">
        <form name=formulaire action="a" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Numéro de numéro de licence : <?php echo $Joueurs[0][0];?></p>
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom : <?php echo $Joueurs[0][2];?></p>
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Prenom : <?php echo $Joueurs[0][1];?></p> 
                </di v>
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
                    <p class="Libelle">Poste prefere : <?php echo $Joueurs[0][7];?></p> 
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
                <input type="submit" name="Modifier" value="Modifier" class="BoutonFormulaire" onclick="formulaire.action='../Pages/ModificationJoueurs.php'; return true;">
                <input type="submit" name="Supprimer" value="Supprimer" class="BoutonFormulaire" onclick="formulaire.action='../Pages/SuppressionJoueurs.php'; return true;">
            </div>
        </form>
    </div>
</body>