<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "css/produit.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <section class="container-fluid">
            <section class="main-content">
                <?php


                ?>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
