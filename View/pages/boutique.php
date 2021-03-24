<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "boutique/View/pages/css/boutique.css"; ?>

<?php ob_start(); ?>

<link rel="stylesheet" href="css/boutique.css">

<main>
    <article>
        <section class="container-fluid">
            <section class="main-content">
                <section class="filters">
                    <h1 class="filter-title">FILTRES</h1>
                    <form action="boutique.php" method="get">
                        <section class="box">
                            <p>Quelle catégorie souhaitez vous voir ?</p>
                            <label>
                                <select name="Choix">
                                    <option name="allProducts">Tous les produits</option>
                                    <?php
                                        $displayChoice = new \Controller\Boutique();
                                        $displayChoice->categorieChoice();
                                    ?>
                                </select>
                            </label>
                            <section>
                                <label for="hide">Masquer les produits indisponibles</label>
                                <input type="checkbox" id="hide" name="hide">
                            </section>
                            <section>
                                <label>
                                    <select name="prix" >
                                        <option value="trier">Trier par</option>
                                        <option value="croissant" >Croissant</option>
                                        <option value="decroissant" >Décroissant</option>
                                    </select>
                                </label>
                            </section>
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
                        $resultProducts = new \Controller\Boutique();

                        if((!isset($_GET['hide']))){

                            $resultProducts ->searchCategorie();
                        }
                        elseif(($_GET['Choix'] !== "Tous les produits")){

                            $resultProducts->hideSearchCategorieWithCat();

                        }
                        elseif(($_GET['Choix'] === "Tous les produits")){

                            $resultProducts->hideSearchCategorieWithoutCat();
                        }

                            $resultProducts->searchCategorieWithPrice();

                    ?>
                </section>
            </section>
        </section>
    </article>
</main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>