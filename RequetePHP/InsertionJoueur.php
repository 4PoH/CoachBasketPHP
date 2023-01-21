<?php
    //Déclaration des variables
    //Variables pour accueillir les données du joueur
    $numLicence = $_POST['numLicence'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateN = $_POST['dateN'];
    $photo = $_POST['photo'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];
    $postePref = $_POST['postePref'];
    $commentaire = $_POST['commentaire'];
    $statut = $_POST['statut'];

    require '../FonctionPHP/connBDD.php';
    
    //Visualisation du contenu des variables
    echo $numLicence."\n";
    echo $nom."\n";
    echo $prenom."\n";
    echo $dateN."\n";
    echo $photo."\n";
    echo $taille."\n";
    echo $poids."\n";
    echo $postePref."\n";
    echo $commentaire."\n";
    echo $statut."\n";

    // ///Préparation de la requête
    $req = $linkpdo->prepare('INSERT INTO joueur(NumLicence, Prenom, Nom, DateNaissance, Photo, Taille, Poids, PostePref, Commentaire, idStatus)
                    VALUES(:numLicence, :prenom, :nom, :dateN, :photo, :taille, :poids, :postePref, :commentaire, :statut)');
    
    // ///Exécution de la requête
    $req->execute(array('numLicence' => $numLicence,
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'dateN' => $dateN,
                        'photo' => $photo,
                        'taille' => $taille,
                        'poids' => $poids,
                        'postePref' => $postePref,
                        'commentaire' => $commentaire,
                        'statut' => $statut)); 
            
?> 