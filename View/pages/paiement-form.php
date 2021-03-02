<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "css/paiement-form.css"; ?>

<?php ob_start(); ?>

    <section class="container-fluid">
        <section class="main-content">
            <form action="paiement.php" method="post">
                <label for="prix">Prix</label>
                <input type="text" name="prix" id="prix">
                <button>Procéder au paiement</button>
            </form>
        </section>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>