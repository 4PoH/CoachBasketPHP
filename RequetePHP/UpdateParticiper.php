<?php
    require '../FonctionPHP/connBDD.php';

    $requeteInsertionPartiper = $linkpdo->prepare(' UPDATE participer
                                                    SET titulaire = :p_Titulaire,
                                                        notation = :p_Notation
                                                    WHERE numLicence = :p_NumLicence
                                                    AND IdRencontre = :p_IdRencontre');

    /// Affectation des paramètres de la requetes
    $Titulaire = $_POST['Titulaire'];
    $Notation = $_POST['Notation'];

    $requeteInsertionPartiper->bindParam(':p_Titulaire', $Titulaire);
    $requeteInsertionPartiper->bindParam(':p_Notation', $Notation);
    $requeteInsertionPartiper->bindParam(':p_NumLicence', $_POST['NumLicence']);
    $requeteInsertionPartiper->bindParam(':p_IdRencontre', $_POST['IdRencontre']);

    ///Exécution de la requete requete
    if($requeteInsertionPartiper->execute()){
        echo "L'insertion a bien été prise en compte";
        header('Location: ../Pages/HistoriqueRencontre.php');
    }else{
        $requeteInsertionPartiper->DebugDumpParams();
        echo "L'insertion a échouée";
        echo '<META http-equiv="refresh" content="2; URL=../Pages/HistoriqueRencontre.php">';
    }
?>