
<?php
// liste complete id , cat , opt, prix
// SELECT categorie.id as id, categorie.nom_cat as cat, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id 

// group by id order by cat
// SELECT categorie.id as id, categorie.nom_cat as cat, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id GROUP BY cat ORDER BY id 
require('./php/dbconfig.php');
?>

<?php

$onSelect = ""; // les variables d'environement ...
$totalOptions = "";
$totalOptionsParam = "";
$totalOptionsCalc = "";
$countForeach = 0;
$prixArticle = "";
$numdevis = "";
$img = ";";

if (isset($_SESSION['id'])){
    $iduser =  $_SESSION['id'];
}

$idproduit = $_SESSION['produit'];

if ($idproduit == 1) {
$img = './assets/img/svg/redstrat.svg" alt="strat rouge" height="70%';
}

if ($idproduit == 2) {
$img = './assets/img/svg/jb.png" alt="Jazz burst" height="35%';
}

$lignedevis = 0; 
$total = 0;

/* if (isset($_SESSION['id'])){
$iduser = $_SESSION['id'];
}
 */



if (isset($_POST['projet'])) { // au submit affiche le devis

// récup $numdevis
$sqlnumdevis = "SELECT COALESCE(MAX(id), 0) + 1 as id FROM devis";
$numdevis = mysqli_query($conn,$sqlnumdevis);
$numdevis      = mysqli_fetch_array($numdevis);
$numdevis = $numdevis['id'];

//print_r($numdevis);

$sqlusr = "SELECT nom, prenom, email, adresse, cp, ville FROM users where id = ? ;"; // recup infos client
$requsr = $conn->prepare( $sqlusr );
$requsr->bind_param('i', $iduser);
$requsr->execute();
$requsr->bind_result($nom, $prenom, $email, $adresse, $cp, $ville); 


$requsr->fetch();

/* echo 'part User : <br>'; 
echo 'Id user = '. $_SESSION['id'] .'<br>';
echo $nom .' '. $prenom .' , '. $email .' , '. $adresse.' , '. $cp .' , '. $ville .'<br>';
echo '------------------------<br>'; */

include_once("./pages/devishaut.php") ;

echo '<div>
        <strong>'. $prenom .' '. $nom .'</strong>
        </div>
        <div>'. $adresse.'</div>
        <div>'. $cp .', '. $ville .'</div>
        <div>Mail : '. $email .'</div>
        <div>Phone : +33 non stocké</div>';

$requsr->free_result();


include_once("./pages/devisinter1.php") ;


// SELECT designation as desi, ref, prix FROM article where id = ? ;
// récup designation ref et prix à partir du produit d'id = $idproduit
$sqlart = "SELECT designation as desi, ref, prix FROM article where id = ? ;";
$reqarticle = $conn->prepare( $sqlart );
$reqarticle->bind_param('i', $idproduit);
$reqarticle->execute();
$reqarticle->bind_result($desi, $ref, $prix);

while ($reqarticle->fetch()) {
    $lignedevis += 1;
    /*  echo 'ligne'. $lignedevis .' , designation = '. $desi .' , ref = '. $ref .' , prix = '. $prix .'<br>'; */
    $total += $prix;

    echo '<tr> 
    <td class="center">'. $lignedevis .'</td>
    <td class="left strong">'. $desi .'</td>
    <td class="left">'. $ref .'</td>
        <td class="right">'. $prix .'€</td>
        <!-- <td class="center">1</td> -->
        <td class="right">'. $prix .'€</td>
        </tr>';
    }


    $reqarticle->free_result();
    
    $sqldevis = "INSERT INTO devis (id_user, id_art, date_devis ) VALUES ( $iduser , $idproduit , CURRENT_DATE );";
    $reqdevis = $conn->query($sqldevis);
    echo $conn->error;
//echo '------------------------<br>';


//echo 'part Options : <br>'; 
    foreach($_POST as $key => $value) {
        if ($key !== 'projet'){
            $cut = explode("-", $value);
            $id_cat  = $cut[0];
            $surcout = $cut[1];
            
            // SELECT options.nom_opt FROM options JOIN categorie ON options.id_cat=categorie.id WHERE options.id_cat = 3 AND options.prix = 120
            $sqlopt = 'SELECT options.id as id, options.nom_opt as opt_nom FROM options JOIN categorie ON options.id_cat=categorie.id WHERE options.id_cat = '. $id_cat .' AND options.prix = '. $surcout .' ;';
            $exec_sqlopt = mysqli_query($conn,$sqlopt);
            $reqopt      = mysqli_fetch_array($exec_sqlopt);
            $opt_id = $reqopt['id'];
            
            //echo $numdevis;
            //echo $opt_id.'<br>';
            // Insert into dev_opt 
            $sqldev_opt = "INSERT INTO dev_opt (id_dev, id_opt) VALUES ( $numdevis , $opt_id );";
            $reqdev_opt = $conn->query($sqldev_opt);
            
            
            //echo 'ligne'. $lignedevis .' , categorie.nom_cat = '. $key .' , options.id_cat = '. $id_cat .' , options.nom = '. $reqopt['opt_nom'] .' , options.prix = '. $surcout .'<br>';
            echo '<tr> 
            <td class="center">-</td>
            <td class="left">Option : '. $key .'</td>
            <td class="left">'. $reqopt['opt_nom'] .'</td>
            <td class="right">'. $surcout .'€</td>
            <!-- <td class="center">1</td> -->
            <td class="right">'. $surcout .'€</td>
            </tr>';
            

            $total += $surcout;
        }
    }

    include_once("./pages/devisinter2.php") ;

    $tva = ($total * 0.2);


    echo '    <td class="right">'. $total .'€</td> <!-- généré en 3 -->
            </tr>
            <tr>
                <td class="left">
                    <strong>dont TVA (20%)</strong>
                </td>
                <td class="right">'. $tva .'€</td>
            </tr>
            <tr>
                <td class="left">
                    <strong>Total</strong>
                </td>
                <td class="right">
                    <strong>'. $total .'€</strong>
                </td>';


                include_once("./pages/devisbas.php") ;


echo '<div class="row">
        <div class="col mt-2 mb-2 text-center">
            <a href="./index.php" class="btn btn-success" role="button">Retour à l\'accueil</a>
        </div>';


} else {



    $reqCat = "SELECT categorie.id as id, nom_cat as cat FROM categorie JOIN compo_art_cat ON categorie.id = compo_art_cat.id_cat WHERE id_art = " . $idproduit . " ";
    $exec_reqCat = $conn->query($reqCat);
    $resultCat = $exec_reqCat->fetch_array(MYSQLI_ASSOC);
    
    $reqPrix = "SELECT prix FROM article WHERE id = " . $idproduit . " ";
    $exec_reqPrix = $conn->query($reqPrix);
    $resultPrix = $exec_reqPrix->fetch_array(MYSQLI_ASSOC);
    
    $prixArticle = $resultPrix['prix'];


?>
    <div class="row">
        <div class="col-1">
            <!-- col bord vide -->
        </div>
        <div class="col-10">
            <!-- col-10 contenu général -->
            <div class="row">
                <div class="col-6">
                    <!-- col-5 contenu select/résults -->



                    <form method="POST">
                        <?php
                        foreach ($exec_reqCat as $row) {
                            //$row = $result->fetch_array( MYSQLI_ASSOC ) ;
                            //echo "Catégorie : ". $row['id']. " , ". $row['cat'] ."<br/>" ;

                            // génere les parametres de la fonction JS onSelect qui calcule le total 
                            $onSelect .=        'const prix' . $row['cat'] . ' = Number((document.getElementById("' . $row['cat'] . '").value).split(\'-\')[1]);
                                                document.getElementById("prix' . $row['cat'] . '").innerHTML = prix' . $row['cat'] . ';';
                            
                            $totalOptions .= 'prix' . $row['cat'] . ', ';
                            $countForeach += 1;
                            $totalOptionsParam .= 'num' . $countForeach . ',';
                            $totalOptionsCalc .= 'num' . $countForeach . ' +';



                            echo        '<div class="row mt-5 mb-5 text-center"> <!-- col-6 contenu select -->
                                        <div class="col-2"> <!-- col Titre catégorie -->
                                            <label for="' . $row['cat'] . '">' . $row['cat'] . '</label>
                                        </div>
                                        <div class="col form-group"> <!-- col Select -->
                                            <select class="form-control w-100" id="' . $row['cat'] . '" name="' . $row['cat'] . '" onchange="onSelect()">';



                            $reqOpt = "SELECT categorie.id as id, options.nom_opt as opt, options.prix as prix FROM categorie JOIN options ON options.id_cat = categorie.id WHERE categorie.id = " . $row['id'];
                            $exec_reqOpt = $conn->query($reqOpt);
                            $resultOpt = $exec_reqOpt->fetch_array(MYSQLI_ASSOC);

                            foreach ($exec_reqOpt as $row2) {
                                //$row = $result->fetch_array( MYSQLI_ASSOC ) ;
                                //echo " bois = ". $row['opt']. " , Prix = ". $row['prix'] ."<br/>" ;
                                echo '<option value="' . $row2['id'] . '-' . $row2['prix'] . '">' . $row2['opt'] . '</option>';
                            }

                            echo        '</select>
                                            </div>
                                            <div class="col-4"> <!-- col-4 surcout dyanmaique -->
                                                <h4 id="prix' . $row['cat'] . '"></h4> 
                                            </div>
                                        </div> ';
                        }

                        ?>
                        <div class="row  mt-5 text-center">
                            <!-- Derniere ligne Total : Prix -->
                            <div class="col-8">
                                <h4> Total :</h4>

                            </div>
                            <div class="col-4">
                                <!-- col-6 contenu résults -->
                                <h4 id="total"></h4>
                            </div>
                        </div>

                        <div class="row  mt-5 text-center">
                            <!-- Derniere ligne Total : Prix -->
                            <!-- <div class="col-8">
                            </div> -->

                            <div class="col">
                                <!-- col-6 Bouton submit Général -->
                                <?php
                                if (isset($_SESSION['prenom'])) {
                                    echo '<button type="submit" class="btn btn-success" name="projet" value="<?php echo $idproduit ?>">Validez votre projet</button>';
                                } else {
                                    echo '<H4>Connectez vous pour enregistrer votre projet</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </form>


                </div>

                <div class="col-6 text-center">
                    <!-- col-6 contenu photo -->

                    <img class="mt-4 mb-4" src="<?php echo $img ; ?>">
                </div>
            </div>


        </div>
        <div class="col-1">
            <!-- col bord vide -->
        </div>
    </div>

<?php


    $totalOptions = substr($totalOptions, 0, -1);
    $totalOptionsParam = substr($totalOptionsParam, 0, -1);
    $totalOptionsCalc = substr($totalOptionsCalc, 0, -1);
    // finalise la fonction JS onSelect()
    echo '<script type="text/javascript">

        onSelect();

            function onSelect() {
            ' . $onSelect . '
            totalOptions(' . $totalOptions . ');
        }

        function totalOptions(' . $totalOptionsParam . ') {
            const total =' . $prixArticle . ' + ' . $totalOptionsCalc . ';
            document.getElementById("total").innerHTML = total;
        }

    </script>';
}

?>