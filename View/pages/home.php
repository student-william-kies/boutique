<?php
require ('../../Controller/Product.php');
require ('../../Controller/Http.php');
use Controller\Http;

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}
?>

<?php $css = ""; ?>

<?php ob_start(); ?>

<!-- Empty section for the pictures -->
<section class="container-fluid main__section"></section>

<section class="container-fluid showNewProducts" id="new-products">
    <img src="images/titre_nouveautes.png" alt="titre_nouveaute">
    <section class="container-fluid newProducts">
        <?php
        $display = new \Controller\Product();
        $display -> displayNewProducts();
        ?>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
