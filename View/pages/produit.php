<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "css/produit.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <section class="container-fluid">
            <section class="main-content">
                <?php
                    $getAll = new \Model\Boutique();
                    $product = $getAll->getAllProduct($_GET['id']);

                    var_dump($product);

                    echo " <h2> " .$product[0]['titre']. " </h2> ";
                ?>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
