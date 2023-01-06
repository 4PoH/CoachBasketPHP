<?php
//Variables pour les données de connexion à la base de donnée
    $server = 'localhost';
    $db = 'coachbasket';
    $login = 'root';
    $mdp = '';

///Connexion au serveur MySQL
    try {
        $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
?>