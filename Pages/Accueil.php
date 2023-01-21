<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();

    require '../FonctionPHP/connBDD.php';

    ///Préparation de la requête sans les variables (marqueurs : nominatifs)
    $reqRencontre = $linkpdo->prepare('  SELECT  club.Nom,
                                        club.Logo,
                                        rencontre.ScoreEquipe,
                                        rencontre.ScoreAdverse,
                                        adversaire.Nom,
                                        adversaire.logo,
                                        rencontre.domicile,
                                        rencontre.DateRencontre,
                                        rencontre.IdRencontre

                                FROM club, rencontre, adversaire
                                WHERE rencontre.IdAdversaire = adversaire.IdAdversaire
                                ORDER BY rencontre.DateRencontre;');

    ///Exécution de la requête
    $reqRencontre->execute();
    $resultatRencontre = $reqRencontre->fetchAll();

?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Accueil</title>
    <link rel='stylesheet' href='../CSS/Site.css'>
</head>
<body> 
    
    <?php require '../FonctionPHP/header.php'; ?>

    <div class='Titre'>
        <h1>Les 3 dernières rencontres</h1>
    </div>

    <?php $nbLignes = 0; while($nbLignes < 3) { ?>
            
            <?php if ( $resultatRencontre[$nbLignes][6] === '0') { ?>
                
                <?php if($resultatRencontre[$nbLignes][2] > $resultatRencontre[$nbLignes][3]) {
                    $resultat = "victoire";
                    } elseif ($resultatRencontre[$nbLignes][2] === $resultatRencontre[$nbLignes][3]) {
                        $resultat = "egalite";
                        } else {
                            $resultat = "defaite";
                            }
                ?>

                <div class="DivMatch <?php echo $resultat; ?>">             
                    <div class="DivEquipe">
                        <div class="DivClubEtImage">
                            <div class="TitreEquipe">
                                <h1> <?php echo $resultatRencontre[$nbLignes][0]; ?> </h1>
                            </div>

                            <div class="DivImage">
                                <img src="<?php echo $resultatRencontre[$nbLignes][1]; ?>" alt="Logo de notre club" class="LogoEquipe">
                            </div>
                        </div>

                        <div class="DivScore">
                            <p> <?php echo $resultatRencontre[$nbLignes][2]; ?> </p>
                        </div>
                    </div>

                    <div class="DivEquipe">
                        <div class="DivClubEtImage">
                            <div class="DivImage">
                                <img src="<?php echo $resultatRencontre[$nbLignes][5]; ?> " alt="Logo de L'équipe adverse" class="LogoEquipe">
                            </div>

                            <div class="TitreEquipe">
                                <h1> <?php echo $resultatRencontre[$nbLignes][4]; ?> </h1>
                            </div>
                        </div>

                        <div class="DivScore">
                            <p> <?php echo $resultatRencontre[$nbLignes][3]; ?> </p>
                        </div>
                    </div>
                
                    <div class="ButtonNote">
                        <button type="button">Ajouter des notes sur ce match</button>
                    </div>
                </div>

            <?php } else { ?>
                
            <?php if($resultatRencontre[$nbLignes][2] > $resultatRencontre[$nbLignes][3]) {
                $resultat = "victoire";
                } elseif ($resultatRencontre[$nbLignes][2] === $resultatRencontre[$nbLignes][3]) {
                    $resultat = "egalite";
                    } else {
                        $resultat = "defaite";
                        }
                ?>

                <div class="DivMatch <?php echo $resultat; ?>">             
                    <div class="DivEquipe">
                        <div class="DivClubEtImage">
                            <div class="DivImage">
                                <img src="<?php echo $resultatRencontre[$nbLignes][5]; ?> " alt="Logo de L'équipe adverse" class="LogoEquipe">
                            </div>

                            <div class="TitreEquipe">
                                <h1> <?php echo $resultatRencontre[$nbLignes][4]; ?> </h1>
                            </div>
                        </div>

                        <div class="DivScore">
                            <p> <?php echo $resultatRencontre[$nbLignes][3]; ?> </p>
                        </div>
                    </div>

                    <div class="DivEquipe">
                        <div class="DivClubEtImage">
                            <div class="TitreEquipe">
                                <h1> <?php echo $resultatRencontre[$nbLignes][0]; ?> </h1>
                            </div>

                            <div class="DivImage">
                                <img src="<?php echo $resultatRencontre[$nbLignes][1]; ?>" alt="Logo de notre club" class="LogoEquipe">
                            </div>
                        </div>

                        <div class="DivScore">
                            <p> <?php echo $resultatRencontre[$nbLignes][2]; ?> </p>
                        </div>
                    </div>
                
                    <div class="ButtonNote">
                        <button type="button">Ajouter des notes sur ce match</button>
                    </div>
                </div>
            <?php } ?>
    <?php $nbLignes += 1;} ?>

    <div class="Titre">
        <h1>Nos 3 joueurs phare</h1>
    </div>

    <div class="Titre">
        <h1>Statistiques</h1>
    </div>
</body>
</html>