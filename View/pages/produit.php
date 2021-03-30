<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "css/produit.scss"; ?>

<?php ob_start(); ?>

<?php session_start(); ?>

<main>
    <article>
        <section class="container-fluid">
            <section class="main-content">
                <?php

                    $panier = new  \Controller\Boutique();
                    $panier->creationPanier();


                    $getAll = new \Model\Boutique();
                    $product = $getAll->getAllProduct($_GET['id']);

                if(isset($_POST['add'])) {
                    $addCart = new \Model\Boutique();
                    $addCart->addToCart($_GET['id']);

                    echo'<section class="confirm-add alert alert-info" role="alert">
                            Votre article a bien été rajouté au <a href="paiement-form.php">panier</a>. 
                         </section>';
                }

                echo
                    '<section class="img-item">
                        <img class="img-fluid img-produit" src=' .$product[0]['photo1']. '>
                        <section>
                            <img class="img-fluid img-second-item" src=' .$product[0]['photo2']. '>
                            <img class="img-fluid img-second-item" src=' .$product[0]['photo3']. '>
                        </section>
                     </section>
                     <section class="title-item">
                        <h2>' .ucfirst($product[0]["titre"]). '</h2>
                        <p>' .ucfirst($product[0]['description']). '</p>
                        <hr>
                        <form method="post" action="">
                        <p class="price-size">' .$product[0]['prix']. '€</p>
                        <input class="btn btn-primary" type="submit" name="add" value=" Ajouter au panier">
                        <input type="hidden" name="hiddenAdd" value="' . $product[0]['id_produits'] . '">
                        </form>
                     </section>';
                ?>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
