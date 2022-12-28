<?php
    //Visualisation du contenu des variables
    //echo $_POST['numLicence'];
    //echo $_POST['nom'];
    //echo $_POST['prenom'];
    //echo $_POST['dateN'];
    //echo $_POST['taille'];
    //echo $_POST['poids'];
    //echo $_POST['postePref'];

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
    $req = $linkpdo->prepare('  SELECT *
                                FROM joueur
                                WHERE joueur.NumLicence = :p_numLicence
                                OR soundex(joueur.Prenom) = soundex(:p_prenom)
                                OR soundex(joueur.Nom) = soundex(:p_nom)
                                OR joueur.DateNaissance = :p_dateN
                                OR joueur.Taille = :p_taille
                                OR joueur.Poids = :p_poids
                                OR joueur.PostePref = :p_postePref');
    
    ///Liens entre variables PHP et marqueurs
    $req->bindParam(':p_numLicence', $_POST['numLicence']);
    $req->bindParam(':p_prenom', $_POST['prenom']);
    $req->bindParam(':p_nom', $_POST['nom']);
    $req->bindParam(':p_dateN', $_POST['dateN']);
    $req->bindParam(':p_taille', $_POST['taille']);
    $req->bindParam(':p_poids', $_POST['poids']);
    $req->bindParam(':p_postePref', $_POST['postePref']);
    
    
    ///Exécution de la requête
    $req->execute();
                        
    require '../FonctionPHP/header.php';
?>

<body>
    <div class="">
        <ul class="RetourJoueur">
            <?php foreach ($req as $lines) { ?>
                <li>
                    <img src="" alt="Photo de <?php echo($lines['Nom'].' '.$lines['Prenom']); ?>">
                    <p><?php echo $lines['NumLicence'];?></p>
                    <p><?php echo $lines['Nom'];?></p>
                    <p><?php echo $lines['Prenom'];?></p>
                    <p><?php echo $lines['DateNaissance'];?></p>
                    <p><?php echo $lines['Taille'];?></p>
                    <p><?php echo $lines['Poids'];?></p>
                    <p><?php echo $lines['PostePref'];?></p>
                </li>    
            <?php } ?>
        </ul>
    </div>
</body>