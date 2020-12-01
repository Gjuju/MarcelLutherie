<div class="col-12">
            <div class="row">
                <div class="col-2">
                    <h4 class="text-right">Adresse :</h4>
                </div>
                <div class="col-8 text-center">
                    <h3>Marcel Lutherie</h3>
                    <h5>20 Place de la maire,</h5>
                    <h5>34270 Le triadou</h5>
                    <h5></h5>

                </div>
                <div class="col-2">
                </div>

            </div>
            <div class="row">
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
            }
            window.onload = function(){
		// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
		initMap(); 
            };
        </script>