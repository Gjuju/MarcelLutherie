<?php
session_start();
require('./dbconfig.php');

if (isset($_POST['regform'])){ // si envoi du formulaire register
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $nom = ucwords(stripslashes($_POST['nom']));
    $nom = mysqli_real_escape_string($conn, $nom); 

    // récupérer le prenom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $prenom = ucwords(stripslashes($_POST['prenom']));
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
    $ville = ucwords(stripslashes($_POST['ville']));
    $ville = mysqli_real_escape_string($conn, $ville);

    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
    $mdp = stripslashes($_POST['password']);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    $valmdp = stripslashes($_POST['verifpassword']);
    $valmdp = mysqli_real_escape_string($conn, $valmdp);
    //echo $nom.' , '.$prenom.' , '.$email.' , '.$adresse.' , '.$cp.' , '.$ville.' , '.$mdp.'<br>';
    
    //requéte SQL + mot de passe PAS crypté
        $requete = "INSERT INTO users (nom, prenom, adresse, email, cp, ville, mdp)
                VALUES ( '$nom' , '$prenom' , '$adresse' , '$email' , '$cp' , '$ville' , '$mdp')";
        
    // vérifier que les champs "necessaires" sont renseignés puis envoyer
    if ( $mdp !== $valmdp) {
        echo "les mots de passes ne correspondent pas !";
    } else if ( $nom == '' || $prenom == '' || $adresse == '' || $email = '' || $cp == '' || $ville == '' || $mdp == '' ) {
        echo "un des champs est vide.";
    } else {
        // Exécuter la requête sur la base de données
        $exec_requete = mysqli_query($conn, $requete);

        if($exec_requete){
            echo 'sucess : ';
            //echo $nom.' , '.$prenom.' , '.$email.' , '.$adresse.' , '.$cp.' , '.$ville.' , '.$mdp.'<br>';
            header("Location: ../index.php");

    } else {
        echo 'ça foire ! : ';
        //echo $nom.' , '.$prenom.' , '.$email.' , '.$adresse.' , '.$cp.' , '.$ville.' , '.$mdp.'<br>';
        echo mysqli_error ($conn);
        header("Location: ../index.php");
    }

    }

    
        

}
?>
