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

                    //var_dump($product);

                echo
                    '<section class="img-item">
                        <img class="img-fluid img-produit" src=' .$product[0]['photo1']. '>
                     </section>
                     <section class="title-item">
                        <h2>' .ucfirst($product[0]["titre"]). '</h2>
                        <p>' .$product[0]['description']. '</p>
                        <hr>
                        <p class="price-size">' .$product[0]['prix']. '€</p>
                        <section>
                            <img src="images">
                        </section>
                     </section>';
                ?>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
