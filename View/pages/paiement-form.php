<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "css/paiement-form.css"; ?>

<?php ob_start(); ?>

<?php session_start(); ?>

<section class="container-fluid">
    <section class="container main-content">
        <section class="adding-products">
               <?php
               $displayCart = new \Controller\Boutique();
               $displayCart->afficherPanier();

               ?>
        </section>
        <section class="form-paiement-section">
            <form action="paiement.php" method="post">
                <label for="prix">
                    <p><strong>Total</strong></p>
                    <input type="text" name="prix" id="prix">
                    <button class="btn btn-primary">Payer</button>
                </label>
            </form>
        </section>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>