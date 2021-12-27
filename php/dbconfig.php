<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mluth');
define('DB_PASSWORD', 'mluth');
define('DB_NAME', 'mluth');
define('DB_PORT', '3306');

// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>