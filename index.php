<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcel Lutherie</title>
    <link rel="stylesheet" href="./css/css.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


<!-- Rend navbar et contenu de la page dynamique -->
<?php // permet de remplir les pages et modifier la navbar
            $page = ''; // set page vide au chargement
            $bodycontent = ''; // set bodycontent vide au chargement
            $index[1] = "./pages/accueil.php"; // sommaire de la navbar id / pagecontent 
            $index[2] = "./pages/galerie.php";
            $index[3] = "./pages/chordico.php";
            $index[4] = "./pages/custom.php";
            $index[5] = "./pages/contact.php";
            $index[6] = "./pages/admin.php";

            // vérifie Id de page pour changer modifier class="active" de navbar et charger corps de page. 
            if (!isset($_GET['id'])) { // si href?id unset
                $page = 1; // page = 1
                $bodycontent = $index[$page]; // bodycontent de l'index $page = 1 du sommaire
            } else { // si href?id set
                $page = $_GET['id'];  // page = id
                $bodycontent = $index[$page]; // bodycontent de l'index $page du sommaire
                if ( $page == 5 ) { // ne charge les contenus openstreetmap que si la page contact est appelée
                    echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
                    <style type="text/css">
                        #map{ /* la carte DOIT avoir une hauteur sinon elle n\'apparaît pas */
                            height:400px;
                        }
                    </style>
                    ';
                }
            }
        ?>

</head>

<!-- <body onload="test()"> -->
    <body>

    <div class="container-fluid">

    <!-- du débug de session -->
    <!-- <pre>
        <?php echo print_r($_SESSION); ?><br>
        <?php if (isset($_SESSION['info'])) {
            echo "info = ".$_SESSION['info'];
        } ?>
    </pre>  -->




        <!-- Appel modal info ne marche pas lors de déconnexion -->
        <?php
        if ((isset($_SESSION['info'])) && $_SESSION['info'] == 1) {
        //appel modal info
            unset($_SESSION['info']);
            echo 'session = 1 devrait afficher modal info de bienvenue <br>';
            ?>
                <script type="text/javascript">
                        $(document).ready(function(){
                        $("#modinfo").modal("show");
                    });
                </script>
            <?php

        } elseif ((isset($_SESSION['info'])) && $_SESSION['info'] == 2) {

        //appel modal logout
            ?>
            <script type='text/javascript'>
                    $(document).ready(function(){
                    $('#modinfo').modal('show');
                });
                </script>;
            <?php
            session_destroy();
        }
        ?>





        <!-- Header avec image -->
        <div class="row">
            <div class="col-12">
                <img src="./assets/img/Head.png" class="img-fluid" alt="Responsive image">
                <div class="carousel-caption">
                    <p class="bighead">Marcel Lutherie</p>
                </div>
            </div>
        </div>





        <!-- Navbar -->
        <div class="navbar navbar-expand-sm bg-dark navbar-dark"><a class="navbar-brand" href="?">Marcel Lutherie</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 1) echo 'active'; ?>" href="./index.php?id=1">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 2) echo 'active'; ?>" href="./index.php?id=2">Galerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 3) echo 'active'; ?>" href="./index.php?id=3">ChorDico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 4) echo 'active'; ?>" href="./index.php?id=4">Custom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 5) echo 'active'; ?>" href="./index.php?id=5">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        echo '<li class="nav-item">
                                <a class="nav-link <?php if ($page == 6) echo \'active\'; ?>" href="./index.php?id=6">Admin</a>
                            </li>';
                    } 
                    ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Modal login -->
                <li class="nav-item">
                    <?php 
                    if (!isset($_SESSION['prenom'])) {
                        echo '<a class="nav-link" id="login" href="#modlogin" data-toggle="modal">Connexion</a>';
                    } else {
                        echo '<a class="nav-link" id="logout" href="#modlogout" data-toggle="modal">Déconnexion</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>

        <div>
        <!-- corps de la page -->
        <?php
            include_once("$bodycontent") ;
            ?>
        </div>

        <!-- Footer -->
        <!-- https://mdbootstrap.com/docs/jquery/navigation/footer/ -->
        <footer class="page-footer bg-dark text-white pt-4">
            <div class="container-fluid text-center text-md-left">
                <div class="row">
                    <div class="col-md-8 mt-md-0 mt-4">
                        <h5 class="text-uppercase">Footer Content</h5>
                        <p>Here you can use rows and columns to organize your footer content.</p>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3">

                    <div class="col-md-4 mb-md-0 mb-4">
                        <h5 class="text-uppercase">Liens</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Link 1</a>
                            </li>
                            <li>
                                <a href="#!">Link 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-copyright text-center py-3">© 2020 Copyright: MarcelLutherie.com</div>

        </footer>

<div class="container">
        <?php
        include_once("./php/modal.php") ;
        ?>
</div>


    </div>



</body> 

<script src="./js/js.js"></script>

</html>