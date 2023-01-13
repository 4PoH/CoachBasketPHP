<?php
    
    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $req = $linkpdo->prepare('  INSERT INTO rencontre(IdRencontre, LieuRencontre, Domicile, DateRencontre, HeureRencontre, ScoreEquipe, ScoreAdverse)
                                VALUES(:p_IdRencontre, :p_lieuRencontre, :p_domicile, :p_dateRencontre, :p_heureRencontre, :p_scoreEquipe, :p_scoreAdverse)');
    
    ///Liens entre variables PHP et marqueurs
    $req->bindParam(':p_IdRencontre', $_POST['IdRencontre']);
    $req->bindParam(':p_lieuRencontre', $_POST['LieuRencontre']);
    $req->bindParam(':p_domicile', $_POST['Domicile']);
    $req->bindParam(':p_dateRencontre', $_POST['DateRencontre']);
    $req->bindParam(':p_heureRencontre', $_POST['HeureRencontre']);
    $req->bindParam(':p_scoreEquipe', $_POST['ScoreEquipe']);
    $req->bindParam(':p_scoreAdverse', $_POST['ScoreAdverse']);
    
    
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