<?php
// liste complete id , cat , opt, prix
// SELECT categorie.id as id, categorie.nom_cat as cat, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id 

// group by id order by cat
// SELECT categorie.id as id, categorie.nom_cat as cat, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id GROUP BY cat ORDER BY id 
require('./php/dbconfig.php');
?>


<?php
    $onSelect = "";
    $totalOptions = "";
    $totalOptionsParam = "";
    $totalOptionsCalc = "";
    $countForeach = 0 ;
    $prixArticle = '';


if (!isset($_POST['produit'])){


    echo '<div class="row">
            <div class="col-3"> <!-- col bord vide -->
            </div>

                <div class="col"> 
                    <form class="group-form" method="post">
                    
                        <label for="prod">Veuillez choisir votre produit à customiser</label>
                            
                                <select class="form-control w-75" name="produit">
                                    <option value="1">Guitare</option>
                                    <option value="2">Basse</option>
                                </select>
                        <input class="btn btn-success" type="submit" name="submit" value="C\'est parti !" >
                    </form>
                </div>

            <div class="col-3"> <!-- col bord vide -->
            </div>
        </div>';



} else {
    $idproduit = $_POST['produit'];
    
    $reqCat = "SELECT categorie.id as id, nom_cat as cat FROM categorie JOIN compo_art_cat ON categorie.id = compo_art_cat.id_cat WHERE id_art = ". $idproduit ." ";
    $exec_reqCat = $conn->query($reqCat);
    $resultCat = $exec_reqCat->fetch_array(MYSQLI_ASSOC);

    $reqPrix = "SELECT prix FROM article WHERE id = ". $idproduit ." ";
    $exec_reqPrix = $conn->query($reqPrix);
    $resultPrix = $exec_reqPrix->fetch_array(MYSQLI_ASSOC);

    $prixArticle = $resultPrix['prix'];
    

    //print_r($resultCat);


    echo '<div class="row">
            <div class="col-1"> <!-- col bord vide -->
                </div>
                    <div class="col-10"> <!-- col-10 contenu général -->
                        <div class="row">
                            <div class="col-6">  <!-- col-5 contenu select/résults -->
<form method="POST">';
    


    foreach($exec_reqCat as $row) {
        //$row = $result->fetch_array( MYSQLI_ASSOC ) ;
        //echo "Catégorie : ". $row['id']. " , ". $row['cat'] ."<br/>" ;
        
            // génere les parametres de la fonction JS onSelect qui calcule le total 
            $onSelect .=    'const prix'. $row['cat'] .' = Number((document.getElementById("'. $row['cat'] .'").value).split(\'-\')[1]);
                            document.getElementById("prix'. $row['cat'] .'").innerHTML = prix'. $row['cat'] .';';
            $totalOptions .= 'prix'. $row['cat'] .', ';
            $countForeach += 1 ;
            $totalOptionsParam .= 'num'. $countForeach .',';
            $totalOptionsCalc .= 'num'. $countForeach .' +';



        echo '<div class="row mt-5 mb-5 text-center"> <!-- col-6 contenu select -->
    
                <div class="col-2"> <!-- col Titre catégorie -->
                    <label for="'. $row['cat'] .'">'. $row['cat'] .'</label>
                </div>
                <div class="col form-group"> <!-- col Select -->
                    <select class="form-control w-100" id="'. $row['cat'] .'" name="'. $row['cat'] .'" onchange="onSelect()">';



        $reqOpt = "SELECT categorie.id as id, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id WHERE categorie.id = ". $row['id'] ;
        $exec_reqOpt = $conn->query($reqOpt);
        $resultOpt = $exec_reqOpt->fetch_array(MYSQLI_ASSOC);

        foreach($exec_reqOpt as $row2) {
            //$row = $result->fetch_array( MYSQLI_ASSOC ) ;
            //echo " bois = ". $row['opt']. " , Prix = ". $row['prix'] ."<br/>" ;
            echo '<option value="'. $row2['id'] .'-'. $row2['prix'] .'">'. $row2['opt'] .'</option>';
        }

        echo '</select>
            </div>
            <div class="col-4"> <!-- col-4 surcout dyanmaique -->
                <h4 id="prix'. $row['cat'] .'"></h4> 
            </div>
        </div> ';

        
    }

                    echo '<div class="row  mt-5 text-center"> <!-- Derniere ligne Total : Prix -->
                            <div class="col-8"> 
                            <h4> Total :</h4> 

                            </div>
                            <div class="col-4"> <!-- col-6 contenu résults -->
                                <h4 id="total"></h4> 
                            </div>
                            </div>

                            <div class="row  mt-5 text-center"> <!-- Derniere ligne Total : Prix -->
                            <div class="col-8"> 
                            </div>

                            <div class="col-4"> <!-- col-6 Bouton submit Général -->
                                <button type="submit" class="btn btn-success" name="validcustom">Valider</button> 
                            </div>
                            </div>
</form>
                    </div>

                    <div class="col-6 text-center" > <!-- col-6 contenu photo -->
                        <img src="./img/svg/redstrat.svg" alt="strat rouge" height="70%">
                    </div>
                </div>


            </div>
        <div class="col-1">  <!-- col bord vide -->
    </div>
</div>';


$totalOptions = substr($totalOptions, 0, -1);
$totalOptionsParam = substr($totalOptionsParam, 0, -1);
$totalOptionsCalc = substr($totalOptionsCalc, 0, -1);
    // finalise la fonction JS onSelect()
    echo '<script type="text/javascript">

        onSelect();

            function onSelect() {
            '. $onSelect .'
            totalOptions('. $totalOptions .');
        }

        function totalOptions('. $totalOptionsParam .') {
            const total ='. $prixArticle .' + '. $totalOptionsCalc .';
            document.getElementById("total").innerHTML = total;
        }


    </script>';






}
?>


<?php
    
    

?>
