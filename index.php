<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcel Lutherie</title>
    <link rel="stylesheet" href="/css/css.css">
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
</head>

<body>


    <div class="container-fluid">

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

        <div class="navbar navbar-expand-sm bg-dark navbar-dark"><a class="navbar-brand" href="#!">Marcel
                Lutherie</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#!">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Gallerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">ChorDico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Custom</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="#!">Admin</a>
                            </li>';
                    } 
                    ?>
                



            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Modal login -->
                <li class="nav-item">
                    <?php 
                    if (!isset($_SESSION['prenom'])) {
                        echo '<a class="nav-link" id="login" href="#conlogin" data-toggle="modal">Connexion</a>';
                    } else {
                        echo '<a class="nav-link" id="logout" href="#conlogout" data-toggle="modal">Déconnexion</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>

        <div>
        </div>


        <!-- corps de la page -->
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p class="text-right">Qui sommes nous :</p>
                </div>
                <div class="col-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At nihil ullam enim, sunt
                        voluptatibus,
                        aliquam deleniti ipsam dicta quia facere nostrum! Odit quidem nam odio, soluta quis
                        totam
                        praesentium, obcaecati deserunt qui consequatur aliquid provident blanditiis culpa
                        labore hic
                        non! Similique, maxime quasi nemo rerum quo blanditiis sunt a? Recusandae.
                    </p>
                </div>
                <div class="col-1">
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <p class="text-right">Que faisons nous :</p>
                    <p></p>
                    <p></p>
                </div>
                <div class="col-8">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea adipisci eum nemo, iusto non
                        quibusdam repellat explicabo eveniet. Similique velit exercitationem quasi fuga nobis ducimus
                        veritatis saepe soluta esse nam quae, cumque omnis, ut possimus? Vitae suscipit ipsa
                        necessitatibus? Ea, soluta quidem voluptatum fuga esse ad assumenda illum similique asperiores
                        nam dolor amet dignissimos velit dolore blanditiis explicabo! Magni aliquam rerum quibusdam,
                        quasi eveniet officia ipsam molestiae quidem ab ipsum vitae accusamus unde nobis, id ipsa
                        perspiciatis animi. Voluptas eius iure error harum repellendus blanditiis natus enim magnam?
                        Eligendi reprehenderit quaerat itaque magnam earum, aliquid quod ea fugit. Veritatis odio
                        aperiam, illo consequuntur labore explicabo sint consequatur dolorem vitae veniam odit officia
                        numquam alias, fugit rem necessitatibus doloribus dicta nemo excepturi quibusdam temporibus
                        nostrum. Atque ipsum corrupti nam nihil expedita dolorum doloremque quo architecto, provident
                        culpa earum magnam deleniti ratione aliquam cum natus beatae ut similique veniam laudantium
                        ipsa? 
                    </p>
                </div>
                <div class="col-1">
                </div>
            </div>
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


        <?php
        include "./php/modal.php";
        ?>



    </div>
</body>

</html>