<?php

    require '../FonctionPHP/connBDD.php';

    //Déclaration des variables
    //Variables pour accueillir les données pour adversaire
    $nomadversaire = $_POST['nom'];
    $logo = $_POST['logo'];

    ///Préparation des requêtes
  
    $requeteInsertionAdversaire = $linkpdo->prepare('INSERT INTO adverdaire(Nom, lienLogo)
                                                      VALUES(:p_nomAdversaire, :p_logo)');
    
    /// Affectation des paramètres de la requetes
    $requeteInsertionAdversaire->bindParam(':p_nomAdversaire', $nomadversaire);
    $requeteInsertionAdversaire->bindParam(':p_logo', $logo);

    ///Résultat de la requete
    if($requeteInsertionAdversaire->execute()){
        echo "L'insertion a bien été prise en compte";
        //header('Location: ../Pages/Licencies.php');
    }else{
        $requeteInsertionAdversaire->DebugDumpParams();
        echo "L'insertion a échouée";
        //echo '<META http-equiv="refresh" content="2; URL=../Pages/Licencies.php">';
    }
            
?> 