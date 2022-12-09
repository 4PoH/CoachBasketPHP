<?php
            $numLicence = $_POST['numLicence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateN = $_POST['dateN'];
            $photo = $_POST['photo'];
            $taille = $_POST['taille'];
            $poids = $_POST['poids'];
            $postepref = $_POST['postepref'];
            $commentaire = $_POST['commentaire'];

            $server = 'localhost';
            $db = 'equipe_basket';
            $login = 'root';
            $mdp = '';
                ///Connexion au serveur MySQL
                try {
                $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
                }
                catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
                }
                
                ///Préparation de la requête
                $req = $linkpdo->prepare('INSERT INTO joueur(Numlicence,Nom, Prenom, Photo, Taille, Poids,
                PostePref, Commentaire) VALUES(:numLicence, :nom, :prenom, :dateNaissance, :photo, :taille, :poids, :postepref, :commentaire)');
                ///Exécution de la requête
                $req->execute(array('numLicence' => $numLicence,
                                    'nom' => $nom,
                                    'prenom' => $prenom,
                                    'dateN' => $dateN,
                                    'photo' => $photo,
                                    'taille' => $taille,
                                    'poids' => $poids,
                                    'postepref' => $postepref
                                    'commentaire' => $commentaire

                                ));       
            
        ?> 