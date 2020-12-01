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
$countForeach = 0;
$prixArticle = "";


if (!isset($_POST["produit"])) {

?>
    <div class="row">
        <div class="col-3">
            <!-- col bord vide -->
        </div>

        <div class="col">
            <form class="group-form" method="post">

                <label for="prod">Veuillez choisir votre produit à customiser</label>

                <select class="form-control w-75" name="produit">
                    <option value="1">Guitare</option>
                    <option value="2">Basse</option>
                </select>
                <input class="btn btn-success" type="submit" name="submit" value="C'est parti !">
            </form>
        </div>

        <div class="col-3">
            <!-- col bord vide -->
        </div>
    </div>;
<?php


} else {
    $_SESSION['produit'] = $_POST['produit'];
    header("Location: ./index.php?id=6"); 

}
?>


