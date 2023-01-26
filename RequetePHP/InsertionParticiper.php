<?php

    require '../FonctionPHP/connBDD.php';

    //Déclaration des variables
    //Variables pour accueillir les données pour la participation
    $titulaire= $_POST['titulaire'];
    $notation = $_POST['notation'];
    $numLicence = $_POST['numLicence'];
    $idRencontre = $_POST['IdRencontre'];

    ///Préparation des requêtes
  
    $requeteInsertionPartiper = $linkpdo->prepare('INSERT into participer(titulaire, Notation , NumLicence, IdRecontre)
                                            VALUES(:p_titulaire, :p_notation, :p_numLicence, :p_IdRencontre)');
    
    /// Affectation des paramètres de la requetes
    $requeteInsertionPartiper->bindParam(':p_titulaire', $titulaire);
    $requeteInsertionPartiper->bindParam(':p_notation', $notation);
    $requeteInsertionPartiper->bindParam(':p_numLicence', $numLicence);
    $requeteInsertionPartiper->bindParam(':p_idRencontre', $idRencontre);

    ///Execution de la requete pour obtenir l'idStatut
    
    if($requeteInsertionPartiper->execute()){
        echo "L'insertion a bien été prise en compte";
        header('Location: ../Pages/Licencies.php');
    } else {
        $requeteInsertionPartiper->DebugDumpParams();
        echo "L'insertion a échouée";
        echo '<META http-equiv="refresh" content="2; URL=../Pages/Licencies.php">';
    }
            
?> 