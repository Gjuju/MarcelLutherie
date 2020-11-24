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
    
    //requéte SQL + mot de passe PAS crypté
        $requete = "INSERT INTO users (nom, prenom, adresse, email, cp, ville, mdp)
                VALUES ( '$nom' , '$prenom' , '$adresse' , '$email' , '$cp' , '$ville' , '$mdp')";
        
    // s'assure que l'utilisateur n'es pas déjà enregistré par "email"
        $requverif = "SELECT email FROM users WHERE email = '$email' ";
        $exec_verif = mysqli_query($conn,$requverif) or die(mysql_error());
        //echo '<br> printr exec_verif'.print_r($exec_verif);
        $repverif = mysqli_fetch_array($exec_verif);
        //echo '<br> printr repverif = '.print_r($repverif);

    if ($nom == '' || $prenom == '' || $adresse == '' || $email = '' || $cp == '' || $ville == '' || $mdp == '' ) { // vérifier que les champs "necessaires" sont renseignés puis envoyer
        echo "un des champs est vide.";
        $_SESSION['regFail'] = 1;
        header("Location: ../index.php");
    } else if ( $mdp !== $valmdp) { 
        echo "les mots de passes ne correspondent pas !";
        $_SESSION['regFail'] = 1;
        header("Location: ../index.php");
    } else if ( $email == $repverif['email'] ) {
        echo "L'utilisateur existe déjà.";
        $_SESSION['regFail'] = 1;
        header("Location: ../index.php");
    } else {
        // Exécuter la requête sur la base de données
        $exec_requete = mysqli_query($conn, $requete);

        if($exec_requete){
            echo 'sucess : ';
            $_SESSION['regOk'] = 1;
            //echo $nom.' , '.$prenom.' , '.$email.' , '.$adresse.' , '.$cp.' , '.$ville.' , '.$mdp.'<br>';
            header("Location: ../index.php");

    } else {
        $_SESSION['regFail'] = 1;
        echo 'ça foire ! : ';
        //echo $nom.' , '.$prenom.' , '.$email.' , '.$adresse.' , '.$cp.' , '.$ville.' , '.$mdp.'<br>';
        echo mysqli_error ($conn);
        header("Location: ../index.php");
    }

    }


}
?>
