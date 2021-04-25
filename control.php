<?php
/**
 * Ce script contrôle l'ensemble du site. 
 * Il fait appel aux fonctions, traite les données renvoyées par le modèle et la vue, et envoie les informations à afficher à la vue.
 */
require_once('model.php');
$informationError = "Erreur dans votre identifiant ou votre mot de passe";

//On connecte un utilisateur si le bouton "Connexion" est cliqué et si les informations entrées sont valides.
if (isset($_POST['connection'])){
    if(!empty($_POST['login'])&& !empty($_POST['pwd'])) {
        $result = getAuthentification($_POST['login'], $_POST['pwd']);   
        if($result){
            session_start ();
            // on enregistre les paramètres de notre visiteur comme variables de session
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
            // on redirige notre visiteur vers une page de notre section membre
            header ('location: index.php');
        }
        //Si les paramètres entrés ne correspondent à aucun utilisateur.
        else{
            header ('location: index.php?informationError');
        }
    }
    //Si des paramètres n'ont pas été renseignés.
    else{
        header ('location: index.php?informationError');
    }
}

//On détruit la session si le bouton "Deconnection" est cliqué
if (isset($_GET['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header ('location: index.php?');
}

//On ajoute un utilisateur si le bouton "Inscription" est cliqué et si les informations entrées sont valides.
if (isset($_POST['register'])){
    $newUser = $_POST;
    $estValide = isValid($newUser);
    if($estValide){
        addUser($newUser);
        header('location: index.php?registered');
    }
    else{
        header ('location: index.php?registerError');
    }
}
?>