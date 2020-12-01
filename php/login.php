<?php
    session_start();

    
    require('./dbconfig.php');
    if (isset($_POST['login'])){
        $email = stripslashes($_REQUEST['logemail']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['logpwd']);
        $password = mysqli_real_escape_string($conn, $password);
            $requete = "SELECT prenom,admin FROM users WHERE email='".$email."' and mdp='".$password."'";
        $exec_requete = mysqli_query($conn,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = mysqli_num_rows($exec_requete);
        
        $prenom = "";
        $admin = "";

        if (isset($reponse)) {
        $prenom = $reponse['prenom'];
        $admin = $reponse['admin'];
        }
        
        if($count==1){
            //réussite
            $_SESSION['prenom'] = $prenom;
            $_SESSION['admin'] = $admin;

            $_SESSION['info'] = 1;
            $_SESSION['infotitle'] = "Connexion réussie";
            $_SESSION['infobody'] = '<h5>Ravis de vous revoir '. $_SESSION['prenom']. '</h5>
                        <h5>Vous etes maintenant connecté.</h5>';
            $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
        } else {
            //erreur
            $_SESSION['info'] = 1;
            $_SESSION['infotitle'] = "Connexion Echouée";
            $_SESSION['infobody'] = '<h5>Assurez vous de rentrer les bons</h5>
                                    <h5>email et mot de passe</h5>
                                    <h5>Peut etre n\'etes vous pas encore enregesitré ?</h5>';
            $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#modlogin" aria-label="Close">Retenter ?</button>';
        }
        header("Location: ../index.php");
    }
?>

