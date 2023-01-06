<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();

    //Variables pour les données de connexion à la base de donnée
    $server = 'localhost';
    $db = 'coachbasket';
    $login = 'root';
    $mdp = '';

    ///Connexion au serveur MySQL
    try {
        $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    ///Préparation des requêtes
    $reqHistRenc = $linkpdo->prepare('SELECT rencontre.*, adversaire.Nom, adversaire.LienLogo
                                    FROM rencontre, adversaire
                                    WHERE rencontre.IdAdversaire = adversaire.IdAdversaire
                                    ORDER BY rencontre.DateRencontre DESC');

    ///Exécution de la requête
    $reqHistRenc->execute();

    $HistRenc = $reqHistRenc->fetchAll();
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
        <?php ?>
        </div>

    </body>