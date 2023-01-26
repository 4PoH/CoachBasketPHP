<?php

error_reporting(0);
require '../FonctionPHP/connBDD.php';

$erreur = null;
$username = 'null';

///Préparation des requêtes
$requser = $linkpdo->prepare('SELECT utilisateur.password as motdepasse
                                FROM utilisateur
                                WHERE utilisateur.username = :p_username');



///Exécution de la requête


if (!empty($_POST['nomutilisateur']) && !empty($_POST['motdepasse'])) {
    $requser->bindParam(':p_username', $_POST['nomutilisateur']);
    $requser->execute();
    $user = $requser->fetchAll();

    if (password_verify($_POST['motdepasse'], $user[0]['motdepasse'])) {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: ../Pages/Index.php');
        exit();
    } else {
        $erreur = "Identifiants incorrects";
    }
}

require '../FonctionPHP/auth.php';
if (est_connecte()){
    header('Location:../Pages/Index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/Site.css">
</head>

<body>
    <?php if ($erreur):?>
        <div>
            <?= $erreur ?>
        </div>
    <?php endif?>

    <div class="Corps">
        <form action="" method="post" class="LoginFormulaire">
            <div>
                <input type="text" name="nomutilisateur" placeholder="Nom d'utilisateur">
            </div>
            <div>
                <input type="password" name="motdepasse" placeholder="Votre mot de passe">
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>