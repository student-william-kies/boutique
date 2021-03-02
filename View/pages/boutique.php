<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "css/boutique.css"; ?>

<?php ob_start(); ?>

<main>
    <article>
        <section class="container-fluid">
            <section class="main-content">
                <section class="filters">
                    <h1 class="filter-title">FILTRES</h1>
                    <form action="boutique.php" method="get">
                        <section class="box">
                            <select name="Choix">
                                <option>Choisissez votre catégorie</option>
                                <?php
                                    $displayChoice = new \Controller\Boutique();
                                    $displayChoice->categorieChoice();
                                ?>
                            </select>
                            <input class="valid" type="submit" name="search" value="Go !">
                        </section>
                    </form>
                </section>
                <section class="new-product">
                    <h1 class="filter-title">NOUVEAUTES</h1>
                    <?php
                        $lastProducts = new \Model\Boutique();
                        $lastProducts ->getLastProducts();
                    ?>
                </section>
                <section class="banner">
                    <img class="banner-img" src="images/banner.jpg" alt="banner">
                </section>
                <section class="all-products">
                    <?php
                        //if(isset($_GET['search'])){
                            $categorieProducts = new \Controller\Boutique();
                            $categorieProducts->searchCategorie();
                        //}
                        //else{
                            $allProducts = new \Model\Boutique();
                            $allProducts ->displayAllProducts();
                        //}

                        // En suspens pour le moment.
                        //$addTocart = new \Controller\Boutique();
                        //$addTocart ->addTocart();

                    ?>
                </section>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>