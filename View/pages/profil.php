<?php
require ('../../Controller/Http.php');
use Controller\Http;

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

?>

<?php $css = "css/profil.css"; ?>

<?php ob_start(); ?>

<h2 id="text__profil">Votre compte</h2>
<section class="container profil__section">

    <a href="identity.php" class="container upleft">
        <section class="ico__text">
            <i class="fas fa-user"></i>
            <p><strong>Informations</strong></p>
        </section>
    </a>

    <a href="address.php" class="container upmid">
        <section class="ico__text">
            <i class="fas fa-map-marker-alt"></i>
            <p><strong>Adresse</strong></p>
        </section>
    </a>

    <a href="commandView.php" class="container upright">
        <section class="ico__text">
            <i class="fas fa-history"></i>
            <p><strong>Historique d'achat</strong></p>
        </section>
    </a>

    <?php
    if (isset($_SESSION['utilisateur']['id']))
    {
    if ($_SESSION['utilisateur']['id_droits'] == 1337 || $_SESSION['utilisateur']['id_droits'] == 42)
    {
    echo ('
    <a href="admin.php" class="container downleft">
        <section class="ico__text">
            <i class="fas fa-clipboard"></i>
            <p><strong>Administrations</strong></p>
        </section>
    </a>
    ');
    }
    }
    ?>
</section>

<section class="container form__deco">
    <form method="POST" action="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href=""><input type="submit" name="logout" value="Déconnexion" class="form-control btn__deco"></a></li>
        </ul>
    </form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
