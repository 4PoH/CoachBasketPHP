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
            <?php for ($match = 0; $match < $Nbmatch[0][0]; $match++) { 
                if($HistRenc[$match][2] == 1) {
                ?>
            <div>
                <div>
                    <div>Image <?php echo($Club[0][1]); ?></div>
                    <div>Club <?php echo($Club[0][0]); ?></div>
                    <div>Score <?php echo($HistRenc[$match][5]); ?></div>
                </div>

                <div>
                    <div>Image <?php echo($HistRenc[$match][9]); ?></div>
                    <div>Club <?php echo($HistRenc[$match][8]); ?></div>
                    <div>Score <?php echo($HistRenc[$match][6]); ?></div>
                </div>
            </div>
            <div>
                <div>Lieu <?php echo($HistRenc[$match][1]); ?></div> <div>Date <?php echo($HistRenc[$match][3]); ?></div> <div>Heure <?php echo($HistRenc[$match][4]); ?></div>
            </div>
            
            <div>
            <button type="button">Ajouter des notes sur ce match</button>
            </div>

            <?php } else { ?>

            <div>
                <div>
                    <div>Image <?php echo($HistRenc[$match][9]); ?></div>
                    <div>Club <?php echo($HistRenc[$match][8]); ?></div>
                    <div>Score <?php echo($HistRenc[$match][6]); ?></div>
                </div>

                <div>
                    <div>Image <?php echo($Club[0][1]); ?></div>
                    <div>Club <?php echo($Club[0][0]); ?></div>
                    <div>Score <?php echo($HistRenc[$match][5]); ?></div>
                </div>
            </div>

            <div>
                <div>Lieu <?php echo($HistRenc[$match][1]); ?></div> <div>Date <?php echo($HistRenc[$match][3]); ?></div> <div>Heure <?php echo($HistRenc[$match][4]); ?></div>
            </div>

            <div>
                <button type="button">Ajouter des notes sur ce match</button>
            </div>

            <?php }} ?>
        </div>

    </body>