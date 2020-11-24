<?php
session_start();
require('./dbconfig.php');

if (isset($_POST['regform'])){ // si envoi du formulaire register
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $nom = stripslashes($_POST['nom']);
    $nom = mysqli_real_escape_string($conn, $nom); 

    // récupérer le prenom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $prenom = stripslashes($_POST['prenom']);
    $prenom = mysqli_real_escape_string($conn, $prenom); 
    
    // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);

    // récupérer l'adresse et supprimer les antislashes ajoutés par le formulaire
    $adresse = stripslashes($_POST['adresse']);
    $adresse = mysqli_real_escape_string($conn, $adresse); 

    // récupérer le CP d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $cp = stripslashes($_POST['cp']);
    $cp = mysqli_real_escape_string($conn, $cp); 
    
    // récupérer la ville et supprimer les antislashes ajoutés par le formulaire
    $ville = stripslashes($_POST['ville']);
    $ville = mysqli_real_escape_string($conn, $ville);

    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
    $mdp = stripslashes($_POST['password']);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    //$valmdp = stripslashes($_POST['verifpassword']);
    //$valmdp = mysqli_real_escape_string($conn, $valmdp);
    
    //requéte SQL + mot de passe crypté
        $requete = "INSERT INTO users (nom, prenom, email, adresse, cp, ville, mdp)
                VALUES ('$nom', '$prenom', '$email', '$adresse', '$cp', '$ville', '$mdp')";
        
    // vérifier que les champs "utiles" sont renseignés puis envoyer
    
    // Exécuter la requête sur la base de données
    $exec_requete = mysqli_query($conn, $requete) or die(mysql_error());
    if($exec_requete){
        echo 'sucess';
        header("Location: ../index.php");
    } else {
        echo 'ça foire !';
        header("Location: ../index.php");
    }
        

}
?>
