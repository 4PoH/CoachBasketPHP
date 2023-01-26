<?php
    require '../FonctionPHP/connBDD.php';
    $Licence = $_POST['Licence'];
    $Rencontre = $_POST['idRencontre'];

    $requeteUpdateJoueurs = $linkpdo->prepare(' UPDATE participer
                                                set titulaire = p_titulaire, notation = p_notation
                                                where numLicence = p_numLicence
                                                and IdRencontre = p_IdRencontre');

    /// Affectation des paramètres de la requetes
    $requeteInsertionPartiper->bindParam(':p_titulaire', $titulaire);
    $requeteInsertionPartiper->bindParam(':p_notation', $notation);
    $requeteInsertionPartiper->bindParam(':p_numLicence', $numLicence);
    $requeteInsertionPartiper->bindParam(':p_idRencontre', $idRencontre);

    $requeteUpdateJoueurs->execute();
    //header('Location: ../Pages/Licencies.php');
?>