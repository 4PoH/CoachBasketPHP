<?php
    
    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteInsertionRencontre = $linkpdo->prepare('  INSERT INTO rencontre(LieuRencontre, Domicile, DateRencontre, HeureRencontre, ScoreEquipe, ScoreAdverse, IdAdversaire)
                                VALUES(:p_lieuRencontre, :p_domicile, :p_dateRencontre, :p_heureRencontre, :p_scoreEquipe, :p_scoreAdverse, :p_IdAdversaire)');
    
    $requeteIdAdversaire = $linkpdo->prepare(' SELECT adversaire.idadversaire FROM adversaire WHERE adversaire.nom = :p_NomAdversaire');

    ///Liens entre variables PHP et marqueurs
    $requeteIdAdversaire->bindParam(':p_NomAdversaire', $_POST['Adversaire']);

    ///Exécution de la requete requete
    if($requeteIdAdversaire->execute()){
        echo "L'id adversaire a ete trouve";
    } else {
        $requeteInsertionRencontre->DebugDumpParams();
        echo "id adversaire non trouve";
    }

    $Id = $requeteIdAdversaire->fetchAll();

    $IdAdversaire = $Id[0][0];

    $requeteInsertionRencontre->bindParam(':p_lieuRencontre', $_POST['LieuRencontre']);
    $requeteInsertionRencontre->bindParam(':p_domicile', $_POST['Domicile']);
    $requeteInsertionRencontre->bindParam(':p_dateRencontre', $_POST['DateRencontre']);
    $requeteInsertionRencontre->bindParam(':p_heureRencontre', $_POST['HeureRencontre']);
    $requeteInsertionRencontre->bindParam(':p_scoreEquipe', $_POST['ScoreEquipe']);
    $requeteInsertionRencontre->bindParam(':p_scoreAdverse', $_POST['ScoreAdverse']);
    $requeteInsertionRencontre->bindParam(':p_IdAdversaire', $IdAdversaire);
    
    
    
    ///Exécution de la requete requete
    if($requeteInsertionRencontre->execute()){
        echo "L'insertion a bien été prise en compte";
        header('Location: ../Pages/Licencies.php');
    }else{
        $requeteInsertionRencontre->DebugDumpParams();
        echo "L'insertion a échouée";
        echo '<META http-equiv="refresh" content="2; URL=../Pages/Licencies.php">';
    }
?>