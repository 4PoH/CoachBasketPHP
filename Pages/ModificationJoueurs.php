<?php
    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteJoueurs = $linkpdo->prepare('   SELECT joueur.*, statut.Libelle as Statut
                                            FROM joueur, statut
                                            WHERE joueur.idStatut = statut.idStatut
                                            AND joueur.NumLicence = :p_numLicence
                                ');

    $requeteUpdateJoueurs = $linkpdo->prepare(' UPDATE joueur
                                                set Nom = :p_nom ,
                                                    Prenom = :p_prenom,
                                                    DateNaissance = :p_dateN,
                                                    /*Photo = :p_photo,*/
                                                    Taille = :p_taille,
                                                    Poids = :p_poids,
                                                    PostePref = :p_postePref,
                                                    Commentaire = :p_commentaire,
                                                    idStatut = :p_statut
                                                where joueur.Numlicence = :p_numLicence');

    $requeteStatut = $linkpdo->prepare('SELECT statut.Libelle FROM statut');
    
    $requeteNombreStatut = $linkpdo->prepare('SELECT count(statut.Libelle) as NB FROM statut');

    $requeteStatutJoueur = $linkpdo->prepare('SELECT idStatut
                                        FROM statut
                                        WHERE statut.Libelle = :p_Libelle');

    ///Liens entre variables PHP et marqueurs
    $requeteJoueurs->bindParam(':p_numLicence', $_POST['Licence']);

    $requeteUpdateJoueurs->bindParam(':p_numLicence', $_POST['Licence']);
    $requeteUpdateJoueurs->bindParam(':p_nom', $_POST['nom']);
    $requeteUpdateJoueurs->bindParam(':p_prenom', $_POST['prenom']);
    $requeteUpdateJoueurs->bindParam(':p_dateN', $_POST['dateN']);
    ///$requeteUpdateJoueurs->bindParam(':p_photo', $_POST['photo']);
    $requeteUpdateJoueurs->bindParam(':p_taille', $_POST['taille']);
    $requeteUpdateJoueurs->bindParam(':p_poids', $_POST['poids']);
    $requeteUpdateJoueurs->bindParam(':p_postePref', $_POST['postePref']);
    $requeteUpdateJoueurs->bindParam(':p_commentaire', $_POST['commentaire']);

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
        require '../FonctionPHP/header.php';

    ?>

    <div class="Titre">
        <h1>Modification</h1>
    </div>

    <div class="container">
        <form name=formulaire action="a" method="post">
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
                <input type="submit" name="Modifier" value="Modifier" class="BoutonFormulaire" onclick="formulaire.action='../Pages/ModificationJoueurs.php'; return true;">
                <input type="submit" name="Annuler" value="Annuler" class="BoutonFormulaire" onclick="formulaire.action='../Pages/Licencies.php'; return true;">
            </div>
            
            <?php
            //Quand on clique sur le bouton modifier
            if(isset($_POST['Modifier'])) {
                $requeteStatutJoueur->bindParam(':p_Libelle', $_POST['statut']);
                $requeteStatutJoueur->execute();
                $StatutJoueur = $requeteStatutJoueur->fetchAll();


                $requeteUpdateJoueurs->bindParam(':p_statut', $StatutJoueur[0][0]);
                if($requeteUpdateJoueurs->execute()){
                    echo "La modification a bien été prise en compte";
                }else{
                    $requeteUpdateJoueurs->DebugDumpParams();
                    echo "La modification a échouée";
                }
                
                echo '<META http-equiv="refresh" content="2; URL=../Pages/Licencies.php">';
                //header('Location: ../Pages/Licencies.php');
            }

            //Quand on clique sur le bouton annuler
            if(isset($_POST['Annuler'])) {
                header('Location: ../Pages/Licencies.php');
            }
            ?>

        </form>
    </div>
</body>