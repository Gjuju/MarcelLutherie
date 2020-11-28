<?php
// liste complete id , cat , opt, prix
// SELECT categorie.id as id, categorie.nom_cat as cat, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id 

// group by id order by cat
// SELECT categorie.id as id, categorie.nom_cat as cat, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id GROUP BY cat ORDER BY id 
?>




<?php
    require('./php/dbconfig.php');
    $reqCat = "SELECT categorie.id as id, categorie.nom_cat as cat FROM categorie JOIN options ON options.id_cat = categorie.id GROUP BY id ";
    $exec_reqCat = $conn->query($reqCat);
    $resultCat = $exec_reqCat->fetch_array(MYSQLI_ASSOC);

    foreach($exec_reqCat as $row) {
        //$row = $result->fetch_array( MYSQLI_ASSOC ) ;
        echo "Catégorie : ". $row['id']. " , ". $row['cat'] ."<br/>" ;

        $reqOpt = "SELECT categorie.id as id, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id WHERE categorie.id = ". $row['id'] ;
        $exec_reqOpt = $conn->query($reqOpt);
        $resultOpt = $exec_reqOpt->fetch_array(MYSQLI_ASSOC);

        foreach($exec_reqOpt as $row) {
            //$row = $result->fetch_array( MYSQLI_ASSOC ) ;
            echo " bois = ". $row['opt']. " , Prix = ". $row['prix'] ."<br/>" ;
            
        }

    }


?>







<div class="row">
    <div class="col-1"> <!-- col bord vide -->
        </div>
            <div class="col-10"> <!-- col-10 contenu -->
                <div class="row"> <!-- col-6 contenu select/résults -->
                    <div class="col-5"> 
debut

                        <div class="row mt-5 mb-5 text-center"> <!-- col-6 contenu select -->
                            <div class="col-2"> <!-- col-6 contenu résults -->
                                <label for="Manche">Manche : </label>
                            </div>


                            <div class="col form-group"> 
                                <select class="form-control w-100" id="manche">
                                    <option value="0€">érable</option>
                                    <option value="+40€">padouk</option>
                                    <option value="+80€">acajou</option>
                                    <option value="+120€">multi-plis erable noyer wenge</option>
                                </select>
                            </div>
                            

                            <div class="col-4"> <!-- col-6 contenu résults -->
                                <h4>+ 0€</h6> <!-- Doit afficher la valeur dynamiquement -->
                            </div>
                        </div> 

fin

                        <div class="row  mt-5 text-center"> <!--  -->
                            <div class="col-6"> 
                            <h4> Total :</h4> <!-- Doit afficher la valeur dynamiquement -->

                            </div>
                            <div class="col-6"> <!-- col-6 contenu résults -->
                                <h4> 2220€</h4> <!-- Doit afficher la valeur dynamiquement -->
                            </div>
                        </div>
                    </div>

                    <div class="col-7 text-center" > <!-- col-6 contenu photo -->
                        <img src="./img/svg/redstrat.svg" alt="strat rouge" height="80%">
                    </div>
                </div>
            </div>
        <div class="col-1"> <!-- col bord vide -->
    </div>
</div>


