<?php
    session_start();

    
    require('./dbconfig.php');
    if (isset($_POST['login'])){
        $email = stripslashes($_POST['logemail']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_POST['logpwd']);
        //$password = mysqli_real_escape_string($conn, $password);
        $requete = "SELECT id,prenom,admin,mdp FROM users WHERE email='".$email."'";
        $exec_requete = mysqli_query($conn,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = mysqli_num_rows($exec_requete);
        
        $iduser = "";
        $prenom = "";
        $admin = "";

        if (isset($reponse)) {
        $iduser = $reponse['id'];
        $prenom = $reponse['prenom'];
        $admin = $reponse['admin'];
        $hash = $reponse['mdp'];
        }

        if (password_verify($password , $hash)) { // on teste le bon
            $validmail = 1;
        }
        
        if($count == 1 && $validmail == 1){
            //réussite
            $_SESSION['prenom'] = $prenom;
            $_SESSION['id'] = $iduser;
            $_SESSION['admin'] = $admin;

            $_SESSION['info'] = 1;
            $_SESSION['infotitle'] = "Connexion réussie";
            $_SESSION['infobody'] = '<h5>Ravis de vous revoir <strong>'. $_SESSION['prenom']. '</strong></h5>
                        <h5>Vous êtes maintenant connecté.</h5>';
            $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Continuer</button>';
        } else {
            //erreur
            $_SESSION['info'] = 1;
            $_SESSION['infotitle'] = "Connexion échouée";
            $_SESSION['infobody'] = '<h5>Assurez vous de rentrer les bons</h5>
                                    <h5>email et mot de passe.</h5>
                                    <h5>Peut etre n\'êtes vous pas encore enregesitré ?</h5>';
            $_SESSION['infobutton'] = '<button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#modlogin" aria-label="Close">Retenter ?</button>';
        }
        header("Location: ../index.php");
    }
?>

