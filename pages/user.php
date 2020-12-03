<?php
require('./php/dbconfig.php');
$iduser =  $_SESSION['id'];
$nomuser = $_SESSION['prenom'];
$idart = "";

//$selectuser = "";
$selectdevis = "";
$write = "";
$total = "";

// recup users avec devis
$sqldevis = "SELECT id, date_devis from devis WHERE id_user = $iduser ;"; // recup infos client
    $reqdevis = $conn->prepare($sqldevis);
    $reqdevis->execute();
    $reqdevis->bind_result($iddevis, $datedevis);

while ($reqdevis->fetch()) {
    $selectdevis .= "<option value=\"$iddevis\">Devis n° $iddevis du $datedevis</option>";
}
$reqdevis->free_result();


if (isset($_POST['devis'])) {
    $iddevis = $_POST['devis'];
    $total = 0;
    // recup devis de l'user
    $sqlwrite = "SELECT article.designation as desi, article.ref as ref, article.prix as prix from article JOIN devis ON devis.id_art = article.id WHERE devis.id = $iddevis ;"; // recup infos client
    $reqwrite = $conn->prepare($sqlwrite);
    $reqwrite->execute();
    $reqwrite->bind_result($desi, $ref, $prix);

    $write = "";
    $write = '<div class="container">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="table-responsive-sm"> <!-- devisinter1.php -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Produit</th>
                                        <th>Ref</th>
                                        <th class="right">Prix</th>
                                        <!-- <th class="center">Qté</th> -->
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>';

    while ($reqwrite->fetch()) {
        $write .= '<tr> <!-- généré article-->
                        <td class="center">#</td>
                        <td class="left strong">' . $desi . '</td>
                        <td class="left">' . $ref . '</td>
                        <td class="right">' . $prix . '€</td>
                        <td class="right">' . $prix . '€</td>
                    </tr>';
        $total += $prix;
    }

    $reqwrite->free_result();

    // récup liste options 
    $sqlwrite = "SELECT options.nom_opt as nom, options.prix as prix, categorie.nom_cat as cat 
                    FROM options 
                    JOIN categorie ON options.id_cat = categorie.id 
                    WHERE options.id IN 
                    (SELECT dev_opt.id_opt FROM dev_opt WHERE id_dev = $iddevis) ;"; // recup infos client
    
    $reqwrite = $conn->prepare($sqlwrite);
    $reqwrite->execute();
    $reqwrite->bind_result($nom, $prix, $cat);

    while ($reqwrite->fetch()) {
        $write .= '<tr> <!-- généré option -->
                        <td class="center">-</td>
                        <td class="left">Option : ' . $cat . '</td>
                        <td class="left">' . $nom . '</td>
                        <td class="right">' . $prix . '€</td>
                        <td class="right">' . $prix . '€</td>
                    </tr>';
        $total += $prix;
    }


    $write .=    '</tbody> <!-- devisinter2.php -->
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                        </div>

                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>' . $total . '€</strong>
                                        </td>


                                    </tr> <!-- devisbas.php -->
                                </tbody>
                            </table>

                        </div>

                    </div>

                    </div>
                    </div>
                    </div>';

    $reqwrite->free_result();
}



?>


<div class="text-center mt-4 mb-4">
    <h4><?php echo "Bonjour $nomuser" ?></h4>
</div>
<form class="group-form mt-4 mb-4" method="post">
    <div class="row">
        <div class="col-4">
            <label for="client">
                <h4 class="text-right">Veuillez choisir un devis</h4>
            </label>
        </div>
        <div class="col">
            <select class="form-control w-100" name="devis">
                <?php echo $selectdevis ?>
            </select>
        </div>
        <div class="col-3">
            <input class="btn btn-success" type="submit" name="submit" value="Go !">
        </div>
    </div>
</form>

<!-- affiche select devis -->
<?php
echo $write;
?>
