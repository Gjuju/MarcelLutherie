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
    $mdp = htmlspecialchars ($_POST['password']);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    $valmdp = htmlspecialchars ($_POST['verifpassword']);
    $valmdp = mysqli_real_escape_string($conn, $valmdp);
    
            
    // s'assure que l'utilisateur n'es pas déjà enregistré par "email"
        $requverif = "SELECT email FROM users WHERE email = '$email' ";
        $exec_verif = mysqli_query($conn,$requverif);
        //$repverif = mysqli_fetch_array($exec_verif);
        if (mysqli_num_rows($exec_verif) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($exec_verif);
            if ($email == $row['email'])
            {
                $_SESSION['info'] = 1;
                $_SESSION['infotitle'] = "Enregistrement échoué";
                $_SESSION['infobody'] = '<h5>L\'utilisateur enregistré avec :</h5>
                                            <h5>'.$email.'</h5>
                                            <h5>existe déjà</h5>';
                $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
                header("Location: ../index.php");
            }

        if ($nom == '' || $prenom == '' || $adresse == '' || $email = '' || $cp == '' || $ville == '' || $mdp == '' ) { // vérifier que les champs "necessaires" sont renseignés puis envoyer
        // l'un des champs est vide.
        $_SESSION['info'] = 1;
        $_SESSION['infotitle'] = "Enregistrement échoué";
        $_SESSION['infobody'] = '<h5>Des champs ne sont pas renseignés.</h5>
                                <h5>Veuillez tout renseigner.</h5>';
        $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
        header("Location: ../index.php");
        } 
        
        if ( $mdp !== $valmdp) { 
        // les mots de passes ne correspondent pas !
        $_SESSION['info'] = 1;
        $_SESSION['infotitle'] = "Enregistrement échoué";
        $_SESSION['infobody'] = '<h5>Les mots de passe ne sont pas identiques</h5>
                                <h5>Veuillez recommencer.</h5>';
        $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
        header("Location: ../index.php");
        } 
    
        } else {
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        // Exécuter la requête INSERT sur la base de données
        $requete = "INSERT INTO users (nom, prenom, adresse, email, cp, ville, mdp)
                VALUES ( '$nom' , '$prenom' , '$adresse' , '$email' , '$cp' , '$ville' , '$mdp')";
        $exec_requete = mysqli_query($conn, $requete);

        if($exec_requete){
            // réussite !
            $_SESSION['info'] = 1;
            $_SESSION['infotitle'] = "Enregistrement effectué";
            $_SESSION['infobody'] = '<h5>Bienvenue !</h5>
                                    <h5>Vous pouvez désormais vous connecter.</h5>';
            $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
            header("Location: ../index.php");

        } else {
            // ça foire côté connexion !
            $_SESSION['info'] = 1;
            $_SESSION['infotitle'] = "Enregistrement échoué";
            $_SESSION['infobody'] = '<h5>Nous rencontrons un probleme de serveur</h5>
                                        <h5>Veuillez re-essayer plus tard</h5>';
            $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
                //echo $nom.' , '.$prenom.' , '.$email.' , '.$adresse.' , '.$cp.' , '.$ville.' , '.$mdp.'<br>';
            echo mysqli_error ($conn);
            header("Location: ../index.php");
        }

    }

}
?>
