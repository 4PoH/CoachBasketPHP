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

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $req = $linkpdo->prepare('  SELECT club.Nom, rencontre.ScoreEquipe, rencontre.ScoreAdverse, adversaire.Nom, max(rencontre.DateRencontre), rencontre.IdRencontre
                                FROM club, rencontre, adversaire
                                WHERE rencontre.IdAdversaire = adversaire.IdAdversaire;');

    ///Exécution de la requête
    $req->execute();

    $data = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="../CSS/Site.css">
</head>
<body> 
    
    <?php require '../FonctionPHP/header.php'; ?>

    <div class="Barre">
        <div>
            <button type="button"  class="BoutonMenu" onclick="window.location.href ='AjoutJoueur.php'">Insérer un nouveau joueur </button>
        </div>
        <div>
            <button type="button" class="BoutonMenu" onclick="window.location.href ='NouvelleRencontre.php'">Insérer une nouvelle rencontre</button>
        </div>

        <div>
            <button type="button" class="BoutonMenu" onclick="window.location.href ='PageAMettreIci'">Ajouter des notes post rencontre</button>
        </div>
        <div>
            <button type="button" class="BoutonMenu" onclick="window.location.href ='Consultation.php'">Rechercher un joueur</button>
        </div>
</div>

    <div class="DivMatch">
        <div class="TitreMatch">
            <h1>Dernière rencontre</h1>
        </div>

        <div class="DivEquipe">
            <div class="TitreEquipe">
                <h1> <?php echo $data[0][0] ?> </h1>
            </div>

            <div class="DivImage">
                <img src="/CoachBasketPHP/Images/LogoEquipe.png" alt="Logo de notre club" class="LogoEquipe">
            </div>

            <div>
                <p> <?php echo $data[0][1] ?> </p>
            </div>
        </div>

        <div class="DivEquipe">

            <div class="DivImage">
                <img src="/CoachBasketPHP/Images/LogoEquipe.png" alt="Logo de L'équipe adverse" class="LogoEquipe">
            </div>

            <div class="TitreEquipe">
                <h1> <?php echo $data[0][3] ?> </h1>
            </div>

            <div>
                <p> <?php echo $data[0][2] ?> </p>
            </div>
        </div>
        
        <div>
            <button type="button">Ajouter des notes sur ce match</button>
        </div>
    </div>

    <div>
        <h1>Statistiques</h1>
    </div>
</body>
</html>