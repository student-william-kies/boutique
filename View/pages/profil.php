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

<section class="container profil__section">

    <a href="" class="container upleft">
        <section>
            <i class="fas fa-user"></i>
            <p><strong>Informations</strong></p>
        </section>
    </a>

    <a href="" class="container upmid">
        <section>
            <i class="fas fa-map-marker-alt"></i>
            <p><strong>Adresse</strong></p>
        </section>
    </a>

    <a href="" class="container upright">
        <section>
            <i class="fas fa-calendar-alt"></i>
            <p><strong>Historique des commandes</strong></p>
        </section>
    </a>

    <a href="" class="container downleft">
        <section>
            <i class="fas fa-clipboard"></i>
            <p><strong>Factures</strong></p>
        </section>
    </a>

    <a href="" class="container downmid">
        <section>
            <i class="far fa-credit-card"></i>
            <p><strong>Moyens de paiement</strong></p>
        </section>
    </a>

    <a href="" class="container downright">
        <section>
            <i class="fas fa-comments"></i>
            <p><strong>Mes Avis</strong></p>
        </section>
    </a>
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
