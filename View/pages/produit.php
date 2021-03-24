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

                    echo
                    '<section class="flex-items">
                        <img class="img-produits" src=' .$product[0]['photo1']. '>
                        <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                        <p>' . $product[3] . '</p><p>' . $value[2] . '€</p>
                        <form method="post" name="add">
                        <input type="submit" name="add" value=" Ajouter au panier">
                        <input type="hidden" name="hiddenAdd" value="' . $value[0] . '">
                        </form>
                        </section>';
                ?>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
