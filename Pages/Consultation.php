<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Consultation</title>
        <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
    </head>
 <body>
    <div class="TitrePageConsultation">
        <h1>Consultation</h1>
    </div>
    
    <?php
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

        //Récupération de tout les statuts disponibles
        ///Préparation de la requête
        $req = $linkpdo->prepare('Select statut.libellestatut FROM statut');

        ///Exécution de la requête
        $req->execute(array()); 
    ?>

    <div>
        <form name="formu" action="ajoutJoueur.php" method="post">
            <div class="Formulaire">
                <div class="LigneFormulaire">
                    <p class="Libelle">Numéro de numéro de licence : </p> <input class="CaseEntree" type="text" name="numLicence">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Nom : </p> <input class="CaseEntree" type="text" name="nom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Prenom : </p> <input class="CaseEntree" type="text" name="prenom">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Date de naissance : </p> <input class="CaseEntree" type="text" name="dateN"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Photo : </p> <input class="CaseEntree" type="text" name="photo"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Taille : </p> <input class="CaseEntree" type="int" name="taille"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poids : </p> <input class="CaseEntree" type="int" name="poids">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Poste prefere : </p> <input class="CaseEntree" type="text" name="postePref"> 
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Commentaire : </p> <input class="CaseEntree" type="text" name="commentaire">
                </div>
                <div class="LigneFormulaire">
                    <p class="Libelle">Statut : </p>
                    <input list="Statut" name="Statut">
                        <datalist id="Statut">
                            <option value="Chocolate">
                            <option value="Coconut">
                            <option value="Mint">
                            <option value="Strawberry">
                            <option value="Vanilla">
                        </datalist>
                </div>
            </div>

            <div class="DivBoutonFormulaire">
                <input type="reset" name="" value="Vider" class="BoutonFormulaire">
                <input type="submit" name="" value="Ajouter" class="BoutonFormulaire" onclick="formu.action='InsertionJoueur.php'">
                <input type="submit" name="" value="Rechercher" class="BoutonFormulaire">
                <input type="submit" name="" value="Modifier" class="BoutonFormulaire">
                <input type="submit" name="" value="Supprimer" class="BoutonFormulaire">
            </div>

            </form>
        </div>
    </body>
</html>