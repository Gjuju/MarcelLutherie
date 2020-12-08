<?php
/* require('./php/dbconfig.php'); // faire pointer vers votre BdD

$id = "";
$hash = "";
$indice = 0;
$table = [];

// recup Id user et mdp en clair pour en faire la tableau $table
$sqlusr = "SELECT id, mdp FROM users ;"; // à modifier pour votre table
$requsr = $conn->prepare($sqlusr);
$requsr->execute();
$requsr->bind_result($id, $mdp);

while ($requsr->fetch()) {
    $hash = password_hash($mdp, PASSWORD_DEFAULT); // hash
    $table[''.$id.''] = $hash; // puis stocke dans table
}

$requsr->free_result(); // libere mémoire avant nouvelle requette


foreach ($table as $id => $hash) {
    $sqlupd = "UPDATE users SET mdp = \"". $hash ."\" WHERE id = $id "; // à modifier pour votre table
    mysqli_query($conn, $sqlupd); // update le mdp "Hashé" en BdD
    echo mysqli_error ($conn);
} */





// exemple d'utilisation :

// pour l'enregistrement 
$password = 'LeBonMotDePasse'; // le bon mot de passe en clair
$hash = password_hash($password, PASSWORD_DEFAULT); // on le Hash voir doc php : https://www.php.net/manual/fr/function.password-hash.php
echo 'pwd = '. $password .'<br>';
echo 'hash = '. $hash .'<br>';




// pour le login on récupere de la BdD le mot de passe stocké, ici $password
echo 'avec le mauvais pwd --------------------<br>';
$password = 'LeMauvaisMotDePasse';
if (password_verify('lemotdepasse' , $hash)) { // on teste le mauvais
echo "ça le fait<br>";
} else {
    echo 'ça le fait pas<br>';
}

echo 'avec le bon pwd --------------------<br>';
$password = 'LeBonMotDePasse';
if (password_verify($password , $hash)) { // on teste le bon
    echo "ça le fait<br>";
    } else {
        echo 'ça le fait pas<br>';
    }



