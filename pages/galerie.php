<!-- Gallery -->
<!-- 
Gallery is linked to lightbox using data attributes.

To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.

To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number.
-->

<div class="container-fluid">

    <div class="row text-center">
        <div class="col mt-4 mb-4">
            <h4>Voici quelques exemples de nos réalisations.</h4>
        </div>
    </div>


    <div class="container">
        <div>
            <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
                <div class="col-12 col-sm-6 col-lg-3">
                    <img class="w-100" src="./assets/img/gal1/1.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="0">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <img class="w-100" src="./assets/img/gal1/2.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="1">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <img class="w-100" src="./assets/img/gal1/3.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="2">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <img class="w-100" src="./assets/img/gal1/4.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="3">
                </div>
            </div>

            <!-- Modal -->
            <!-- 
            This part is straight out of Bootstrap docs. Just a carousel inside a modal.
            -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div> -->
                        <div class="modal-body">
                            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExample" data-slide-to="1"></li>
                                <li data-target="#carouselExample" data-slide-to="2"></li>
                                <li data-target="#carouselExample" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="./assets/img/gal1/1.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/gal1/2.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/gal1/3.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/img/gal1/4.jpg" alt="Fourth slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col mt-4 mb-4">
            <h4>Nous ajouterons bientôt de nouvelles photos.</h4>
        </div>
    </div>

</div>

