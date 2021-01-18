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



    <!-- jsPDF -->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- Rend navbar et contenu de la page dynamique -->
    <?php // permet de remplir les pages et modifier la navbar
    $page = ''; // set page vide au chargement
    $bodycontent = ''; // set bodycontent vide au chargement
    $index[1] = "./pages/accueil.php"; // sommaire de la navbar id / pagecontent 
    $index[2] = "./pages/galerie.php";
    //$index[3] = "./pages/updateDB.php";
    $index[4] = "./pages/custom.php";
    $index[5] = "./pages/contact.php";
    $index[6] = "./pages/custom-2.php";
    $index[10] = "./pages/user.php";
    $index[99] = "./pages/admin.php";

    // vérifie Id de page pour changer modifier class="active" de navbar et charger corps de page. 
    if (!isset($_GET['id'])) { // si href?id unset
        $page = 1; // page = 1
        $bodycontent = $index[$page]; // bodycontent de l'index $page = 1 du sommaire
    } else { // si href?id set
        $page = $_GET['id'];  // page = id
        $bodycontent = $index[$page]; // bodycontent de l'index $page du sommaire
        if ($page == 5) { // ne charge les contenus openstreetmap que si la page contact est appelée
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

<body class="container-fluid">



    <?php
    /* appel modal inf login etc etc */
    if ((isset($_SESSION['info'])) && $_SESSION['info'] == 1) {
        unset($_SESSION['info']);
    ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#modinfo").modal("show");
            });
        </script>
    <?php

        /* Appel modal déconnexion */
    } elseif ((isset($_SESSION['info'])) && $_SESSION['info'] == 2) {
        //appel modal logout
    ?>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#modinfo').modal('show');
                $('#modinfo').on('hidden.bs.modal', function() {
                    location.reload();
                });
            });
        </script>
        <?php
        session_destroy();
        ?>

    <?php
    }




    ?>
    <!-- Header avec image -->
    <div class="row">
        <div class="col-12 carousel">
            <img src="./assets/img/Head.png" class="img-fluid" alt="heauder de MLutherie">
            <div class="carousel-caption">
                <p class="bighead">Marcel Lutherie</p>
            </div>
        </div>
    </div>





    <!-- Navbar -->
    <div class="navbar navbar-expand-sm bg-dark navbar-dark navcss"><a class="navbar-brand" href="?">Marcel Lutherie</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 1) echo 'active'; ?>" href="./index.php?id=1">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 2) echo 'active'; ?>" href="./index.php?id=2">Galerie</a>
            </li>
            <!-- <li class="nav-item">
                    <a class="nav-link <?php if ($page == 3) echo 'active'; ?>" href="./index.php?id=3">updateDB</a>
                </li> -->
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 4) echo 'active'; ?>" href="./index.php?id=4">Custom</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($page == 5 || $page == 6) echo 'active'; ?>" href="./index.php?id=5">Contact</a>
            </li>

            <?php
            if (isset($_SESSION['prenom']) && $_SESSION['admin'] == 1) {
            ?><li class="nav-item">
                    <a class="nav-link <?php if ($page == 99) echo 'active'; ?>" href="./index.php?id=99">Admin</a>
                </li> <?php
                    } elseif (isset($_SESSION['prenom']) && $_SESSION['admin'] == 0) {
                        ?><li class="nav-item">
                    <a class="nav-link <?php if ($page == 10) echo 'active'; ?>" href="./index.php?id=10">Utilisateur</a>
                </li> <?php
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

    <div class="bg">
        <!-- corps de la page -->
        <?php
        include_once("$bodycontent");
        ?>
    </div>

    <!-- Footer -->
    <!-- https://mdbootstrap.com/docs/jquery/navigation/footer/ -->
    <footer class="page-footer bg-dark text-white pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-8 mt-md-0 mt-4">
                    <h5 class="text-uppercase">Marcel Lutherie</h5>
                    <p>20 Place de la maire,</p>
                    <p>34270 Le triadou</p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">

                <div class="col-4 mb-md-0 mb-4">
                    <h5 class="text-uppercase">Liens</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://fr.wikipedia.org/wiki/Guitare">La Guitare sur Wikipedia</a>
                        </li>
                        <li>
                            <a href="https://4allmusic.com/selection-luthiers-pays/luthiers-en-france/507-luthiers-guitares-occitanie/600-liste-de-luthiers-guitares-occitanie">Les luthiers d'Occitanie</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-copyright text-center py-3">© 2020 Copyright: MarcelLutherie.com</div>

    </footer>

    <div class="container-fluid">
        <?php
        include_once("./php/modal.php");
        ?>
    </div>






</body>
<script src="./js/js.js"></script>

</html>