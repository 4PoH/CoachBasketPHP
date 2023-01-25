<?php
    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteJoueurs = $linkpdo->prepare('  SELECT joueur.*, statut.Libelle as Statut
                                FROM joueur, statut
                                WHERE joueur.idStatut = statut.idStatut
                                ORDER BY joueur.nom, statut.libelle
                                ');
    
    ///Exécution de la requête
    $requeteJoueurs->execute();
?>

<body>
    <?php
        require '../FonctionPHP/connBDD.php';
        require '../FonctionPHP/header.php'
    ?>

    <div class="Titre">
        <h1>Nos licencié(e)s</h1>
    </div>

    <div class="container">
        <?php foreach ($requeteJoueurs as $lines) { ?>
            <div class="ficheJoueur">
                <div>
                    <img src="<?php echo $lines['Photo'];?>" alt="Photo de <?php echo($lines['Nom'].' '.$lines['Prenom']); ?>">
                </div>
                <div>
                    <p><?php echo $lines['NumLicence'];?></p>
                </div>
                <div>
                    <p><?php echo $lines['Nom'];?></p>
                    <p><?php echo $lines['Prenom'];?></p>
                </div>
                <div>
                    <p><?php echo $lines['Taille'];?></p>
                    <p><?php echo $lines['Poids'];?></p>
                </div>
                <div>
                    <p><?php echo $lines['DateNaissance'];?></p>
                    <p><?php echo $lines['PostePref'];?></p>
                    <p><?php echo $lines['Statut'];?></p>
                </div>
                <div>
                    <form name=formulaire action='../Pages/ModificationJoueurs.php' method="post">
                        <input type="hidden" name="Licence" value="<?php echo $lines['NumLicence'];?>">
                        <input type="submit" value="Modifier" class="BoutonFormulaire" onclick="formulaire.action='../Pages/ModificationJoueurs.php'; return true;">
                        <input type="submit" value="Supprimer" class="BoutonFormulaire" onclick="formulaire.action='../Pages/SuppressionJoueurs.php'; return true;">
                    </form>
                </div>
            </div>   
        <?php } ?>
    </div>
</body>