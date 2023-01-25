<?php
    //Déclaration des variables
    //Variables pour accueillir les données du joueur
    $numLicence = $_POST['numLicence'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateN = $_POST['dateN'];
    //$photo = $_POST['photo'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $postePref = $_POST['postePref'];
    $commentaire = $_POST['commentaire'];
    $statut = $_POST['statut'];

    require '../FonctionPHP/connBDD.php';
    
    //Visualisation du contenu des variables
    echo $numLicence."\n";
    echo $nom."\n";
    echo $prenom."\n";
    echo $dateN."\n";
    //echo $photo."\n";
    echo $taille."\n";
    echo $poids."\n";
    echo $postePref."\n";
    echo $commentaire."\n";
    echo $statut."\n";

    $requeteStatut = $linkpdo->prepare('SELECT idStatut
                                        FROM statut
                                        WHERE statut.Libelle = :p_Libelle');

    ///Liens entre variables PHP et marqueurs
    $requeteStatut->bindParam(':p_Libelle', $_POST['statut']);

    ///Execution de la requete pour obtenir l'idStatut
    $requeteStatut->execute();

    ///Résultat de la requete
    $Statut = $requeteStatut->fetchAll();

    $statut = $Statut[0][0];

    // ///Préparation de la requête
    $requeteInsertion = $linkpdo->prepare('INSERT INTO joueur(NumLicence, Prenom, Nom, DateNaissance, Taille, Poids, PostePref, Commentaire, idStatut)
                    VALUES(:p_numLicence, :p_prenom, :p_nom, :p_dateN, :p_taille, :p_poids, :p_postePref, :p_commentaire, :p_statut)');
    
    // Affecatation des paramètres de la requetes
    $requeteInsertion->bindParam(':p_numLicence', $numLicence);
    $requeteInsertion->bindParam(':p_prenom', $prenom);
    $requeteInsertion->bindParam(':p_nom', $nom);
    $requeteInsertion->bindParam(':p_dateN', $dateN);
    $requeteInsertion->bindParam(':p_taille', $taille);
    $requeteInsertion->bindParam(':p_poids', $poids);
    $requeteInsertion->bindParam(':p_postePref', $postePref);
    $requeteInsertion->bindParam(':p_commentaire', $commentaire);
    $requeteInsertion->bindParam(':p_statut', $statut);

    ///Execution de la requete pour obtenir l'idStatut
    
    if($requeteInsertion->execute()){
        echo "L'insertion a bien été prise en compte";
        header('Location: ../Pages/Licencies.php');
    }else{
        $requeteInsertion->DebugDumpParams();
        echo "L'insertion a échouée";
        echo '<META http-equiv="refresh" content="2; URL=../Pages/Licencies.php">';
    }
            
?> 