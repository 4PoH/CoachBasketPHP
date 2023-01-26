<?php
    require '../FonctionPHP/connBDD.php';
    $Licence = $_POST['Licence'];
    $requeteSuppression = $linkpdo->prepare('DELETE FROM joueur WHERE joueur.NumLicence = :p_numLicence');
    $requeteSuppression->execute(array('p_numLicence'=>$Licence));
    header('Location: ../Pages/Licencies.php');
?>