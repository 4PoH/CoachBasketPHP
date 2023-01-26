<?php
    require '../FonctionPHP/connBDD.php';
    $Licence = $_POST['Licence'];
    $Statut = $_POST['statut'];

    $requeteStatutJoueur = $linkpdo->prepare('SELECT idStatut FROM statut WHERE statut.Libelle = :p_Libelle');

    $requeteUpdateJoueurs = $linkpdo->prepare(' UPDATE joueur
                                                set Nom = :p_nom ,
                                                    Prenom = :p_prenom,
                                                    DateNaissance = :p_dateN,
                                                    /*Photo = :p_photo,*/
                                                    Taille = :p_taille,
                                                    Poids = :p_poids,
                                                    PostePref = :p_postePref,
                                                    Commentaire = :p_commentaire,
                                                    idStatut = :p_statut
                                                where joueur.Numlicence = :p_numLicence');


    $requeteStatutJoueur->bindParam(':p_Libelle', $Statut);
    $requeteStatutJoueur->execute();
    $StatutJoueur = $requeteStatutJoueur->fetchAll();
    echo $StatutJoueur[0][0];


    $requeteUpdateJoueurs->bindParam(':p_numLicence', $_POST['Licence']);
    $requeteUpdateJoueurs->bindParam(':p_nom', $_POST['nom']);
    $requeteUpdateJoueurs->bindParam(':p_prenom', $_POST['prenom']);
    $requeteUpdateJoueurs->bindParam(':p_dateN', $_POST['dateN']);
    ///$requeteUpdateJoueurs->bindParam(':p_photo', $_POST['photo']);
    $requeteUpdateJoueurs->bindParam(':p_taille', $_POST['taille']);
    $requeteUpdateJoueurs->bindParam(':p_poids', $_POST['poids']);
    $requeteUpdateJoueurs->bindParam(':p_postePref', $_POST['postePref']);
    $requeteUpdateJoueurs->bindParam(':p_commentaire', $_POST['commentaire']);
    $requeteUpdateJoueurs->bindParam(':p_statut', $StatutJoueur[0][0]);

    $requeteUpdateJoueurs->execute();
    header('Location: ../Pages/Licencies.php');
?>