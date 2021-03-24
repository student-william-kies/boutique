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
        $thisProduct = $productManager -> modifyOneProduct($_GET['id_produits']);

         echo ('<form action="" method="get">
                    <label>
                        Titre
                        <input type="text" value="' . $thisProduct['titre'] . '">
                    </label>
                     <label>
                        Description
                        <input type="text" value="' . $thisProduct['description'] . '">
                    </label>
                     <label>
                        Prix
                        <input type="text" value="' . $thisProduct['prix'] . '">
                    </label>
                     <label>
                        Quantité en Stock
                        <input type="number" value="' . $thisProduct['quantite_stock'] . '">
                    </label>
                    <label>
                        Photo 1 (Sert d\'icone)
                        <input type="text" value="' . $thisProduct['photo1'] . '">
                    </label>
                    <label>
                        Photo 2
                        <input type="text" value="' . $thisProduct['photo2'] . '">
                    </label>
                    <label>
                        Photo 3
                        <input type="text" value="' . $thisProduct['photo3'] . '">
                    </label>
                </form>');
        ?>
    </section>
</section>

<section class="container">
    <a href="profil.php">Retour a votre compte</a>
    <a href="home.php">Accueil</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
