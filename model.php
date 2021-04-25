<?php
require_once('connect-db.php');


/**
 * Cherche un utilisateur dans la base de données.
 * Prends en paramètres l'identifiant et le mot de passe de l'utilisateur.
 * Renvoie les informations de l'utilisateur si les paramètres entrés correspondent à ses informations.
 * Ne renvoie que le premier utilisateur trouvé, les autres utilisateurs ayant un identifiant identique seront ignorés.
 * Renvoie False si les paramètres ne correspondent à aucun utilisateur de la base de données. 
 */
function getAuthentification($login,$pwd)
{
    global $pdo;
    $query = "SELECT DISTINCT * FROM utilisateurs WHERE login=:login AND pwd=:pwd";
    try{
        $prep = $pdo->prepare($query);
        $prep->bindValue(':login', $login);
        $prep->bindValue(':pwd', $pwd);
        $prep->execute();
    }
    catch ( Exeption $e ) {
        die ("erreur dans la requête ".$e->getMessage());
    }
    // on vérifie que la requête ne retourne qu'une seule ligne
    if($prep->rowCount() == 1){
        $result = $prep->fetch();
        return $result;
    }
    else{
        return false; 
    } 
}

/**
 * Ajoute un utilisateur et ses informations à la base de données.
 * Récupère en paramètres les différents attribus entrés dans le formulaire d'inscription sous forme d'un tableau.
 * Formule une requête et l'execute pour ajouter l'utilisateur. 
 */
function addUser($newUser)
{
    global $pdo;
    $nom = $newUser['nom'];
    $prenom = $newUser['prenom'];
    $newLogin = $newUser['newLogin'];
    $newPwd = $newUser['newPwd'];
    //assemblage des paramètres de dates en un format accepté par la base de données (yyyy-mm-dd).
    $dateNaissance = $newUser['annee']."-".$newUser['mois']."-".$newUser['jour'];
    $sexe = $newUser["sexe"];

    $query = "INSERT INTO utilisateurs VALUES(NULL, '$nom', '$prenom', '$newLogin', '$newPwd', '$dateNaissance', '$sexe');";
    try{
        $prep = $pdo->prepare($query);
        $prep->execute();
    }
    catch ( Exeption $e ) {
        die ("erreur dans la requête ".$e->getMessage());
    }
}

/**
 * Vérifie la validité des informations entrées dans le formulaire d'incription.
 * Prends en paramètres les différents attributs entrés dans le formulaire d'inscription sous forme d'un tableau.
 * Vérifie si tous les paramètres en input sont biens remplis.
 * Vérifie si le nouvel identifiant correspond à la confirmation du nouvel identifiant.
 * Vérifie que les paramètres de date sont bien des entiers.
 * Si toutes ces conditions sont validées alors on vérifie si le nouvel identifiant n'est pas identique à un identifiant existant dans la base de données. 
 * Renvoie true si toutes les conditions sont respecté. 
 * Sinon renvoie false.
 */
function isValid($newUser)
{    
    global $pdo;
    if(
        !empty($newUser['nom']) &&
        !empty($newUser['prenom']) &&
        !empty($newUser['newLogin']) &&
        !empty($newUser['confirm']) &&
        !empty($newUser['newPwd']) &&
        !empty($newUser['sexe']) &&
        $newUser['newLogin'] == $newUser['confirm'] &&
        is_numeric($newUser['jour']) &&
        is_numeric($newUser['mois']) &&
        is_numeric($newUser['annee'])
    ){
        //Si les conditions précédentes sont respectées, on appelle la base de donnée pour vérifier l'unicité du nouvel identifiant.
        $newLogin = $newUser['newLogin'];
        $query = "SELECT iduser FROM utilisateurs WHERE login=:login;";
        try{
            $prep = $pdo->prepare($query);
            $prep->bindValue(':login', $newLogin);
            $prep->execute();
        }
        catch ( Exeption $e ) {
            die ("erreur dans la requête ".$e->getMessage());
        }
        // Renvoie True si la requête ne renvoie aucun résultat.
        if($prep->rowCount() == 0){
            return true;
        }
        //Renvoie False si la requête a trouvé un identifiant identique.
        else{
            return false;
        }
    //Renvoie False si une condition initiale n'est pas respectée.
    }
    else{
        return false;
    }
}
?>