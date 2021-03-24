<?php
require ('../../Controller/User.php');
require ('../../Model/User.php');
use Controller\Http;

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

?>

<?php $css = "css/identity.css"; ?>

<?php ob_start(); ?>

    <h2 id="text__identity">Vos informations personnelles</h2>
    <section class="container identity__section">
        <?php
        $displayIdentity = new \Controller\User();
        $displayIdentity -> displayIdentity();
        ?>
    </section>

    <section class="container">
        <a href="profil.php">Retour a votre compte</a>
        <a href="home.php">Accueil</a>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>