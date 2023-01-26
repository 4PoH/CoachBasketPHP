<?php
    require '../FonctionPHP/connBDD.php';
    $IdRencontre = $_POST['IdRencontre'];

    $requeteUpdateRencontre = $linkpdo->prepare('   UPDATE rencontre
                                                    SET lieuRencontre = :p_lieuRencontre,
                                                    Domicile = :p_domicile,
                                                    DateRencontre = :p_dateR,
                                                    HeureRencontre = :p_heureRencontre,
                                                    ScoreEquipe = :p_scoreEquipe,
                                                    ScoreAdverse = :p_scoreAdverse,
                                                    idAdversaire = :p_idAdversaire
                                                    WHERE IdRencontre = :p_idrencontre');

    $requeteIdAdversaire = $linkpdo->prepare('SELECT Adversaire.idAdversaire FROM Adversaire WHERE Adversaire.nom = :p_AdversaireNom');
    $requeteIdAdversaire->bindParam(':p_AdversaireNom', $_POST['Adversaire']);
    $requeteIdAdversaire->execute();
    $IdAdversaire = $requeteIdAdversaire->fetchAll();

    $requeteUpdateRencontre->bindParam(':p_lieuRencontre', $_POST['LieuRencontre']);
    $requeteUpdateRencontre->bindParam(':p_domicile', $_POST['Domicile']);
    $requeteUpdateRencontre->bindParam(':p_dateR', $_POST['DateRencontre']);
    $requeteUpdateRencontre->bindParam(':p_heureRencontre', $_POST['HeureRencontre']);
    $requeteUpdateRencontre->bindParam(':p_scoreEquipe', $_POST['ScoreEquipe']);
    $requeteUpdateRencontre->bindParam(':p_scoreAdverse', $_POST['ScoreAdverse']);
    $requeteUpdateRencontre->bindParam(':p_idAdversaire', $IdAdversaire[0][0]);
    $requeteUpdateRencontre->bindParam(':p_idrencontre', $IdRencontre);

    
    ///Exécution de la requete requete
    if($requeteUpdateRencontre->execute()){
        echo "L'insertion a bien été prise en compte";
        header('Location: ../Pages/HistoriqueRencontre.php');
    }else{
        $requeteUpdateRencontre->DebugDumpParams();
        echo "L'insertion a échouée";
        echo '<META http-equiv="refresh" content="2; URL=../Pages/HistoriqueRencontre.php">';
    }
?>