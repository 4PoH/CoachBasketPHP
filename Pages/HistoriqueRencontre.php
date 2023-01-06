<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();

    require '../FonctionPHP/connBDD.php';

    ///Préparation des requêtes
    $reqHistRenc = $linkpdo->prepare('SELECT rencontre.*, adversaire.Nom, adversaire.LienLogo
                                    FROM rencontre, adversaire
                                    WHERE rencontre.IdAdversaire = adversaire.IdAdversaire
                                    ORDER BY rencontre.DateRencontre DESC');

    $reqClub = $linkpdo->prepare('SELECT club.Nom, club.Logo FROM club');

    $reqNBMatch = $linkpdo->prepare('SELECT count(*) from rencontre');

    ///Exécution de la requête
    $reqHistRenc->execute();
    $HistRenc = $reqHistRenc->fetchAll();

    $reqClub->execute();
    $Club = $reqClub->fetchAll();

    $reqNBMatch->execute();
    $Nbmatch = $reqNBMatch->fetchAll();
?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Historique Rencontre</title>
        <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
    </head>
    <body>
        
        <?php require '../FonctionPHP/header.php'; ?>

        <div class="TitrePageConsultation">
            <h1>Historique Rencontre</h1>
        </div>

        <div>
            <?php for ($match = 0; $match < $Nbmatch[8][0]; $match++) { ?>
            <div>
                <div>
                    <div><?php echo($HistRenc[0][0]); ?></div>
                    <div>Score</div>
                    <div>Image</div>
                </div>

                <div>
                    <div>Image</div>
                    <div>Club</div>
                    <div>Score</div>
                </div>
            </div>
            <div>
                <div>Lieu</div> <div>Date</div> <div>Heure</div>
            </div>
            <?php } ?>
        </div>

    </body>