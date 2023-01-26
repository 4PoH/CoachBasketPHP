<?php

    require '../FonctionPHP/connBDD.php';

    //Déclaration des variables
    //Variables pour accueillir les données pour adversaire
    $idadversaire = $_POST['idAdversaire'];
    $nomadversaire = $_POST['nom'];
    $logo = $_POST['logo'];

    ///Préparation des requêtes
  
    $requeteModificationAdversaire = $linkpdo->prepare('UPDATE adverdaire
                                                      set Nom = :p_nom , LienLogo = :p_logo
                                                      where IdAdversaire = :p_idAdversaire');
    
    /// Affectation des paramètres de la requetes
    $requeteModificationAdversaire->bindParam(':p_idAdversaire', $idadversaire);
    $requeteModificationAdversaire->bindParam(':p_nom', $nomadversaire);
    $requeteModificationAdversaire->bindParam(':p_logo', $notation);

    ///Résultat de la requete
    if($requeteModificationAdversaire->execute()){
        echo "L'insertion a bien été prise en compte";
        //header('Location: ../Pages/Licencies.php');
    }else{
        $requeteModificationAdversaire->DebugDumpParams();
        echo "L'insertion a échouée";
        //echo '<META http-equiv="refresh" content="2; URL=../Pages/Licencies.php">';
    }
            
?> 