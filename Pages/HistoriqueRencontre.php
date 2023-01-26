<?php
    require '../FonctionPHP/auth.php';
    forcer_utilisateur_connecte();

    require '../FonctionPHP/connBDD.php';

    ///Préparation des requêtes
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

    $reqNBMatch = $linkpdo->prepare('SELECT count(*) from rencontre');

    ///Exécution de la requête
    $reqRencontre->execute();
    $resultatRencontre = $reqRencontre->fetchAll();

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
            <?php $nbLignes = 0; while($nbLignes < $Nbmatch[0][0]) { ?>
            
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
                    
                        <div>                                
                            <form name=formu_modification action='../Pages/ModificationRencontre.php' method="post">
                                <input type="hidden" name="IdRencontre" value="<?php echo $resultatRencontre[$nbLignes][8];?>">
                                <input type="submit" value="Modifier" class="BoutonFormulaire">
                            </form>

                            <form name=formu_suppression action='../Pages/SuppressionRencontre.php' method="post">
                                <input type="hidden" name="IdRencontre" value="<?php echo $resultatRencontre[$nbLignes][8];?>">
                                <input type="submit" value="Supprimer" class="BoutonFormulaire">
                            </form>
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
                                <div class="TitreEquipe">
                                    <h1> <?php echo $resultatRencontre[$nbLignes][4]; ?> </h1>
                                </div>

                                <div class="DivImage">
                                    <img src="<?php echo $resultatRencontre[$nbLignes][5]; ?> " alt="Logo de L'équipe adverse" class="LogoEquipe">
                                </div>
                            </div>

                            <div class="DivScore">
                                <p> <?php echo $resultatRencontre[$nbLignes][3]; ?> </p>
                            </div>
                        </div>

                        <div class="DivEquipe">
                            <div class="DivClubEtImage">
                                <div class="DivImage">
                                    <img src="<?php echo $resultatRencontre[$nbLignes][1]; ?>" alt="Logo de notre club" class="LogoEquipe">
                                </div>
                                
                                <div class="TitreEquipe">
                                    <h1> <?php echo $resultatRencontre[$nbLignes][0]; ?> </h1>
                                </div>    
                            </div>

                            <div class="DivScore">
                                <p> <?php echo $resultatRencontre[$nbLignes][2]; ?> </p>
                            </div>
                        </div>
                    
                        <div>                                
                            <form name=formu_modification action='../Pages/ModificationRencontre.php' method="post">
                                <input type="hidden" name="IdRencontre" value="<?php echo $resultatRencontre[$nbLignes][8];?>">
                                <input type="submit" value="Modifier" class="BoutonFormulaire">
                            </form>

                            <form name=formu_suppression action='../Pages/SuppressionRencontre.php' method="post">
                                <input type="hidden" name="IdRencontre" value="<?php echo $resultatRencontre[$nbLignes][8];?>">
                                <input type="submit" value="Supprimer" class="BoutonFormulaire">
                            </form>
                        </div>
                    </div>
                <?php } ?>
        <?php $nbLignes += 1;} ?>
        </div>

    </body>