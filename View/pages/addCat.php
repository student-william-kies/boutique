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

<?php $css = "css/addCat.css"; ?>

<?php ob_start(); ?>

<h2 id="text__admin">Ajout de produits</h2>
<section class="container addCat-content">
    <section>
        <?php
        $test = new \Controller\Product();
        $test -> displayCreatingCat();
        ?>
    </section>
</section>

<section class="container profil__links">
    <a href="profil.php" class="btn btn-primary">Retour a votre compte</a>
    <a href="home.php" class="btn btn-primary">Accueil</a>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
