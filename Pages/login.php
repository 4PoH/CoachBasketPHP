<?php
$erreur = null;
if (!empty($_POST['nomutilisateur']) && !empty($_POST['motdepasse'])) {
    if ($_POST['nomutilisateur'] === 'John' && $_POST['motdepasse'] === 'Doe') {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: ../Pages/Accueil.php');
        exit();
    } else {
        $erreur = "Identifiants incorrects";
    }
}

require '../FonctionPHP/auth.php';
if (est_connecte()){
    header('Location:../Pages/Accueil.php');
    exit();
}

?>

<?php if ($erreur):?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php endif?>

<form action="" method="post">
    <div>
        <input type="text" name="nomutilisateur" placeholder="Nom d'utilisateur">
    </div>
    <div>
        <input type="password" name="motdepasse" placeholder="Votre mot de passe">
    </div>
    <button type="submit">Se connecter</button>
</form>