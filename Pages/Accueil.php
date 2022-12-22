<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="/CoachBasketPHP/CSS/Site.css">
</head>
<body>
    
    <div>
        <h1>CoachBasketAssistant</h1>
    </div>

    <nav class="Barre">
        <div>
            <button type="button"  class="BoutonMenu" onclick="window.location.href ='AjoutJoueur.php'">Insérer un nouveau joueur </button>
        </div>
        <div>
            <button type="button" class="BoutonMenu" onclick="window.location.href ='NouvelleRencontre.php'">Insérer une nouvelle rencontre</button>
        </div>

        <div>
            <button type="button" class="BoutonMenu" onclick="window.location.href ='PageAMettreIci'">Ajouter des notes post rencontre</button>
        </div>
        <div>
            <button type="button" class="BoutonMenu" onclick="window.location.href ='Consultation.php'">Rechercher un joueur</button>
        </div>
    </nav>

    <div class="DivMatch">
        <div class="TitreMatch">
            <h1>Dernier match ajouté</h1>
        </div>

        <div class="DivEquipe">
            <div class="TitreEquipe">
                <h1>Nous</h1>
            </div>

            <div class="DivImage">
                <img src="/CoachBasketPHP/Images/LogoEquipe.png" alt="Logo de notre club" class="LogoEquipe">
            </div>

            <div>
                <p>Score</p>
            </div>
        </div>

        <div class="DivEquipe">

            <div class="DivImage">
                <img src="/CoachBasketPHP/Images/LogoEquipe.png" alt="Logo de L'équipe adverse" class="LogoEquipe">
            </div>

            <div class="TitreEquipe">
                <h1>Equipe adverse</h1>
            </div>

            <div>
                <p>Score</p>
            </div>
        </div>
        
        <div>
            <button type="button">Modifier</button>
        </div>
    </div>

    <div>
        <h1>Statistiques</h1>
    </div>
</body>
</html>