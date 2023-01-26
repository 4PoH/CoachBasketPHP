<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();
    require '../FonctionPHP/connBDD.php';

    $IdRencontre = $_POST['IdRencontre'];

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $requeteJoueurMatch = $linkpdo->prepare('   SELECT joueur.numLicence, joueur.nom, joueur.prenom, joueur.photo, joueur.commentaire, participer.*
                                                FROM joueur,participer
                                                WHERE joueur.numlicence = participer.numlicence
                                                AND participer.Idrencontre =:p_idRencontre');
    
    $requeteNBJoueurMatch = $linkpdo->prepare(' SELECT COUNT(*)
                                                FROM joueur,participer,rencontre
                                                WHERE joueur.numlicence = participer.numlicence
                                                AND participer.IdRencontre = rencontre.IDRencontre
                                                AND participer.Idrencontre =:p_idRencontre');

    $requeteJoueurMatch->bindParam(':p_idRencontre', $IdRencontre);
    $requeteNBJoueurMatch->bindParam(':p_idRencontre', $IdRencontre);

    ///Exécution de la requête
    
    $requeteJoueurMatch->execute();

    $requeteNBJoueurMatch->execute();

    ///Résultat de la requete
    $JoueursMatch = $requeteJoueurMatch->fetchAll();
    $NBJoueursMatch = $requeteNBJoueurMatch->fetchAll();

    //var_dump($JoueursMatch);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Note rencontre</title>
        <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
    </head>
    <body>

    <?php require '../FonctionPHP/header.php'; ?>

    <div class="Titre">
        <h1>Notes rencontre</h1>
    </div>

    <div class="container">
        <?php for ($i = 0; $i <= $NBJoueursMatch[0][0]; $i++) { ?>
            <div class="LigneJoueur">
            <table>
    <tr>
        <th>Numéro de licence</th>
        <th>Photo</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Commentaire</th>
        <th>Notation</th>
        <th>Titulaire</th>
        <th>Envoyer</th>
    </tr>
    <?php for ($i = 0; $i < $NBJoueursMatch[0][0]; $i++) { ?>
        <form name="formulaire" action="../RequetePHP/UpdateParticiper.php" method="post">
            <tr>
                <td> <p name="Licence"> <?php echo $JoueursMatch[$i][0]; ?></p></td>
                <td> <img src="<?php echo $JoueursMatch[0][3];?>" alt="Photo de <?php echo($JoueursMatch[$i][1].' '.$JoueursMatch[$i][2]); ?>"></td>
                <td> <p name="Nom"> <?php echo $JoueursMatch[$i][1]; ?></p></td>
                <td> <p name="Prenom"> <?php echo $JoueursMatch[$i][2]; ?></p></td>
                <td> <p name="Commentaire"> <?php echo $JoueursMatch[$i][4]; ?></p></td>
                <td>
                    <select name="Notation">
                        <option value="1" <?php if($JoueursMatch[$i][6] == 1) echo 'selected'; ?>>1</option>
                        <option value="2" <?php if($JoueursMatch[$i][6] == 2) echo 'selected'; ?>>2</option>
                        <option value="3" <?php if($JoueursMatch[$i][6] == 3) echo 'selected'; ?>>3</option>
                        <option value="4" <?php if($JoueursMatch[$i][6] == 4) echo 'selected'; ?>>4</option>
                        <option value="5" <?php if($JoueursMatch[$i][6] == 5) echo 'selected'; ?>>5</option>
                    </select>
                </td>
                <td> <input type="checkbox" name="Titulaire" value="1" <?php echo ($JoueursMatch[$i][5] == 1) ? 'checked' : ''; ?>></td>

                <input type="hidden" name="NumLicence" value="<?php echo $JoueursMatch[$i][0];?>">
                <input type="hidden" name="IdRencontre" value="<?php echo $JoueursMatch[$i][8];?>">
                <td> <button type="submit" value="Envoyer">Envoyer</button></td>
            </tr>
        </form>
    <?php } ?>
</table>

            </div>   
        <?php } ?>
    </div>

      
    </body>
</html>