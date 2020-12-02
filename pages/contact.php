    <div class="col-12">
        <div class="row">
            <div class="col-2">
                <h4 class="text-right mt-4">Adresse :</h4>
            </div>
            <div class="col-8 text-center">
                <h2 class="font-weight-bold mt-4">Marcel Lutherie</h2>
                <h5>20 Place de la maire,</h5>
                <h5>34270 Le triadou</h5>
                <h5 class="mb-5">Phone : +33 222 333 4567</h5>

            </div>
            <div class="col-2">
            </div>
        </div>

        <div class="row mt-4 mb-4">
            <div class="col-2">
                <h4 class="text-right">C'est ici :</h4>
            </div>
            <div class="col-8">
                <div id="map">
                <!-- Ici s'affichera la carte -->
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>



    <div class="row mt-4 mb-4">
            <div class="col-2">
                <h4 class="text-right">Laissez nous un message :</h4>
            </div>
            <div class="col-8">
                <div>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nom</label>
                        <input type="text" class="form-control" id="" placeholder="Votre nom">
                    </div>
                        <div class="form-group">
                        <label for="message">Votre message</label>
                        <textarea class="form-control" id="message" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Envoyer</button>
                </form>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>




    





        <!-- Fichiers Javascript -->
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
        <script type="text/javascript">
            // On initialise la latitude et la longitude du triadou (centre de la carte)
            var lat = 43.7397875;
            var lon = 3.8523871;
            var macarte = null;
            // Fonction d'initialisation de la carte
            function initMap() {
                // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
                macarte = L.map('map').setView([lat, lon], 11);
                // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    // Il est toujours bien de laisser le lien vers la source des données
                    attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                    minZoom: 1,
                    maxZoom: 20
                }).addTo(macarte);
                // Nous ajoutons un marqueur
                var marker = L.marker([43.7397875, 3.8523871]).addTo(macarte);
            }
            window.onload = function(){
                // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
                initMap(); 
            };
        </script>