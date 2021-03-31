<?php
require ('../../Controller/User.php');
require ('../../Model/User.php');
require ('../../Model/Product.php');
use Controller\Http;

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

?>

<?php $css = "css/history.css"; ?>

<?php ob_start(); ?>

<section class="container history__section">

</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
