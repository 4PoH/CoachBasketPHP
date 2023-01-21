<?php
    //Visualisation du contenu des variables
    //echo $_POST['numLicence'];
    //echo $_POST['nom'];
    //echo $_POST['prenom'];
    echo $_POST['dateN'];
    //echo $_POST['taille'];
    //echo $_POST['poids'];
    //echo $_POST['postePref'];
    echo $_POST['statut'];

    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $req = $linkpdo->prepare('  SELECT joueur.NumLicence, joueur.Prenom, joueur.Nom, joueur.DateNaissance, joueur.Taille, joueur.Poids, joueur.PostePref, statut.Libelle as Statut
                                FROM joueur, statut
                                WHERE joueur.idStatut = statut.idStatut
                                AND (soundex(statut.Libelle) = soundex(:p_statut)
                                OR joueur.NumLicence = :p_numLicence
                                OR joueur.DateNaissance = :p_dateN
                                OR soundex(joueur.Prenom) = soundex(:p_prenom)
                                OR soundex(joueur.Nom) = soundex(:p_nom)
                                OR joueur.Taille = :p_taille
                                OR joueur.Poids = :p_poids
                                OR joueur.PostePref = :p_postePref)');
    
    ///Liens entre variables PHP et marqueurs
    $req->bindParam(':p_numLicence', $_POST['numLicence']);
    $req->bindParam(':p_prenom', $_POST['prenom']);
    $req->bindParam(':p_nom', $_POST['nom']);
    $req->bindParam(':p_dateN', $_POST['dateN']);
    $req->bindParam(':p_taille', $_POST['taille']);
    $req->bindParam(':p_poids', $_POST['poids']);
    $req->bindParam(':p_postePref', $_POST['postePref']);
    $req->bindParam(':p_statut', $_POST['statut']);
    
    
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
                    <p><?php echo $lines['Statut'];?></p>
                </li>    
            <?php } ?>
        </ul>
    </div>
</body>