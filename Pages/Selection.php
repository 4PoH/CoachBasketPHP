<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();

    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $req = $linkpdo->prepare('  SELECT joueur.NumLicence, joueur.Prenom, joueur.Nom, joueur.DateNaissance, joueur.Taille, joueur.Poids, joueur.PostePref, joueur.photo, joueur.Commentaire
                                FROM joueur, statut
                                WHERE joueur.idStatut = statut.idStatut
                                AND statut.Libelle = "Actif"');    
    
    ///Exécution de la requête
    $req->execute();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Selection</title>
        <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
    </head>

    <body>
        
        <?php require '../FonctionPHP/header.php'; ?>

        <div class="Cadre">
            <form action="Selection.php" method="post">
                <?php foreach ($req as $lines) { ?>
                    <div>
                        <div>
                            <img src="<?php echo $lines['photo'];?>" alt="Photo de <?php echo($lines['Nom'].' '.$lines['Prenom']); ?>">
                        </div>
                        <div>
                            <div>
                                <p><?php echo $lines['Nom'];?></p>
                            </div>
                            <div>
                                <p><?php echo $lines['Prenom'];?></p>
                            </div>
                        </div>
                        <div>
                            <div>
                                <p><?php echo $lines['PostePref'];?></p>
                            </div>
                            <div>
                                <p><?php echo $lines['Taille'];?></p>
                            </div>
                            <div>
                                <p><?php echo $lines['Poids'];?></p>
                            </div>
                        </div>
                        <div>
                            <p><?php echo $lines['DateNaissance'];?></p>
                        </div>
                        <div>
                            <p><?php echo $lines['Commentaire'];?></p>
                        </div>
                        <div>
                            <p><?php echo $lines['NumLicence'];?></p>
                        </div>

                        <div>
                            <input type="radio" name="<?php echo $lines['NumLicence'];?>" value="Non" checked>
                            <label for="Non">Non</label>
                        </div>

                        <div>
                            <input type="radio" name="<?php echo $lines['NumLicence'];?>" value="Titulaire">
                            <label for="Titulaire">Titulaire</label>
                        </div>

                        <div>
                            <input type="radio" name="<?php echo $lines['NumLicence'];?>" value="Remplaçant">
                            <label for="Remplaçant">Remplaçant</label>
                        </div>
                    </div>
                <?php } ?>
                <div>
                    <button type="submit">Envoyer</button>
                </div>

                <?php var_dump($_POST)?>

            </form>
        </div>
    </body>
</html>

            