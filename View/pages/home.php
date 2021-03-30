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

<section class="container-fluid main__section" id="new-products">
    <h1>Nouveautés</h1>
    <section class="container-fluid newProducts">
        <?php
        $display = new \Controller\Product();
        $display -> displayNewProducts();
        ?>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
