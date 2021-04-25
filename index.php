<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="fr" class="h-100">

<head>
    <meta charset="utf-8">
    <title>Connexion/Inscription</title>
    <link href="style.css" rel="stylesheet" type="text/css">

</head>

<header>
<form method="post" action="control.php">
    <ul id="connbar">
        <li><p id="conntext">Adresse email ou mobile<input id='formconn' type="text" name="login" value="Votre login"></p></li>
        <li><p id="conntext">Mot de passe<input id='formconn' type="text" name="pwd" value="Votre mot de passe"><br><a href='index.php' id="conntext">Informations de compte oubliées ?</a></p></li>
        <li><p id="conntext"><br><input id='connection' type="submit" name="connection" value="Connexion"><br></p></li>
    </ul>
</header>



<body>
    <div id="body">
            <?php
            if(isset($_SESSION['nom']) && isset($_SESSION['prenom'])){
                echo("<p> vous êtes connectés en tant que ".$_SESSION['prenom']." ".$_SESSION['nom'].". <a href='control.php?logout'> Déconnexion </a></p>");
            }
            elseif(isset($_GET['informationError'])){
                echo("<p><strong>Erreur dans votre identifiant ou votre mot de passe.</strong></p>");
            }

            if(isset($_GET['registered'])){
                echo("<p> Vous avez été correctement enregistré. Veuillez vous connecter.</p>");
            }
            elseif(isset($_GET['registerError'])){
                echo("<p><strong> Erreur dans votre inscription. Certains champs ont peut être été mal renseignés, ou votre nouvel identifiant est peut être identique à un identifiant existant.</strong></p>");
            }
            ?>
    </div>

    
    <div id="body">
        <h1><strong>Inscription</strong></h1>
        <p><strong>C'est gratuit (et ça le restera toujours)</strong></p>

        <form method="post" action="control.php">
            <input type="text" name="prenom" value="Prénom">
            <input type="text" name="nom" value="Nom de famille"><br>
            <input type="text" name="newLogin" value="Numéro de mobile ou email" id='bigform'><br>
            <input type="text" name="confirm" value="Confirmer numéro de mobile ou email" id='bigform'><br>
            <input type="text" name="newPwd" value="Nouveau mot de passe" id='bigform'><br>

            <h2>Date de naissance</h2>
            <ul id="date2">
                <li><select name="jour" id='date'>
                    <option selected>Jour</option>
                    <?php
                    for ($i = 1; $i <= 31; $i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                <select>

                <select name="mois" id='date'>
                    <option selected>Mois</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                <select>

                <select name="annee" id='date'>
                    <option selected>Année</option>
                    <?php
                    for ($i = 2021; $i >= 1921; $i--){
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                <select></li>
                
                <li><a href='index.php' id="date2">Pourquoi indiquer ma date de naissance ?</a></li>
            </ul>
            <p><strong><input id='formsexe' type="radio" name="sexe" value="femme"><label  id='sexe'>Femme</label>
            <input id='formsexe' type="radio" name="sexe" value="homme"><label  id='sexe'>Homme</label></strong></p>            
       
    </div>
</body>


            <p id="footer">En cliquant sur Inscription, vous acceptez nos <a href='index.php'>Conditions</a> et indiquez que vous avez lu notre <a href='index.php'>Politique d'utilisation des données</a>, y compris notre <a href='index.php'>Utilisation des cookies</a>. Vous pourrez recevoir des notifications par texto de la part de Facebook et pouvez vous désabonner à tout moment.</p>
            <input id='register' type="submit" name="register" value="Inscription"><br>
        </form>
    </div>
</body>

</html>