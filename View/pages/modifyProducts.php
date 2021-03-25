<?php
require ('../../Controller/User.php');
require ('../../Model/Product.php');
use Controller\Http;

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

?>

<?php $css = "css/modifyProducts.css"; ?>

<?php ob_start(); ?>

<h2 id="text__admin">Modification du produit</h2>
<section class="container modifyProducts-content">
    <section class="modifyProducts-Form">
        <?php
        $productManager = new \Model\Product();
        $thisProduct = $productManager -> selectOneProduct($_GET['id_produits']);

        var_dump($thisProduct);
        echo ('<form action="" method="get">
                    <label>
                        Titre
                        <input type="text" value="' . $thisProduct['titre'] . '" name="titleProduct">
                    </label>
                     <label>
                        Description
                        <input type="text" value="' . $thisProduct['description'] . '" name="descProduct">
                    </label>
                     <label>
                        Prix
                        <input type="text" value="' . $thisProduct['prix'] . '" name="priceProduct">
                    </label>
                     <label>
                        Quantité en Stock
                        <input type="number" value="' . $thisProduct['quantite_stock'] . '" name="qteProduct">
                    </label>
                    <label>
                        Photo 1 (Sert d\'icone)
                        <input type="text" value="' . $thisProduct['photo1'] . '" name="photo1Product">
                    </label>
                    <label>
                        Photo 2
                        <input type="text" value="' . $thisProduct['photo2'] . '" name="photo2Product">
                    </label>
                    <label>
                        Photo 3
                        <input type="text" value="' . $thisProduct['photo3'] . '" name="photo3product">
                    </label>
                    <section>
                        <label>
                            <button type="submit" class="btn btn-success" name="updateThisProduct">Mettre à jour</button>
                        </label>
                        <label>
                            <button type="submit" class="btn btn-danger" name="deleteThisProduct">Supprimer</button>
                        </label>
                    </section>
                </form>');

         if (isset($_GET['updateThisProduct']))
         {

         }
        ?>
    </section>
</section>

<section class="container">
    <a href="profil.php">Retour a votre compte</a>
    <a href="home.php">Accueil</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
