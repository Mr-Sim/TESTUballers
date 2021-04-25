
<?php
/**
 * Ce script établit la connexion à la base de donnée avec PDO. 
 * Il sera utilisé par les fonctions executant des requêtes SQL. 
 */
try{
    $host = 'mysql:host=localhost;dbname=utilisateurs_test;charset=utf8';
    $login = 'root';
    $password = '';
    $pdo = new PDO( $host, $login, $password ) ;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e){
    die ($e->getMessage()) ;
}
?>
