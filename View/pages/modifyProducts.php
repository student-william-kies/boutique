<?php
require ('../../Controller/User.php');
require ('../../Controller/Product.php');
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
        $productManager = new \Controller\Product();
        $productManager -> selectingOneProduct();

         if (isset($_POST['updateThisProduct']))
         {
             $productManager -> updatingProducts();
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
