<?php
    require '../FonctionPHP/connBDD.php';
    $IdRencontre = $_POST['IdRencontre'];
    $requeteSuppression = $linkpdo->prepare('DELETE FROM rencontre WHERE rencontre.IdRencontre = :p_IdRencontre');

    ///Exécution de la requete requete
    if($requeteSuppression->execute(array('p_IdRencontre'=>$IdRencontre))){
        echo "L'insertion a bien été prise en compte";
        header('Location: ../Pages/HistoriqueRencontre.php');
    }else{
        $requeteSuppression->DebugDumpParams();
        echo "L'insertion a échouée";
        echo '<META http-equiv="refresh" content="2; URL=../Pages/HistoriqueRencontre.php">';
    }
?>