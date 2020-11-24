<?php
    session_start();
    require('./dbconfig.php');
    if (isset($_POST['login'])){
        $email = stripslashes($_REQUEST['logemail']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['logpwd']);
        $password = mysqli_real_escape_string($conn, $password);
            $requete = "SELECT prenom,admin FROM users WHERE email='".$email."' and mdp='".$password."'";
        $exec_requete = mysqli_query($conn,$requete) or die(mysql_error());
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = mysqli_num_rows($exec_requete);
        
        $prenom = "";
        $admin = "";

        if (isset($reponse)) {
        $prenom = $reponse['prenom'];
        $admin = $reponse['admin'];
        }
        
        if($count==1){
            $_SESSION['prenom'] = $prenom;
            $_SESSION['admin'] = $admin;
            $_SESSION['start'] = 1;
            echo "tout s'est bien passé.";
            echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#modlogOk').modal('show');
                });
                </script>";
            
        } else {
            //doit afficher le modal log fail
            $_SESSION['failcon'] = 1;
        }
        header("Location: ../index.php");
    }
?>

