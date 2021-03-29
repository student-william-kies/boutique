<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "boutique/View/pages/css/boutique.css"; ?>

<?php ob_start(); ?>

<?php session_start() ?>

<link rel="stylesheet" href="css/boutique.css">

<main>
    <article>
        <section class="container-fluid">
            <section class="main-content">
                <section class="filters">
                    <h1 class="filter-title">FILTRES</h1>
                    <form action="" method="get" class="search d-flex">
                        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form><br>
                    <form action="boutique.php" method="get">
                        <section class="box">
                            <p>Univers</p>
                            <label>
                                <select class="form-select" name="Choix">
                                    <option name="allProducts">Tous les produits</option>
                                    <?php
                                        $displayChoice = new \Controller\Boutique();
                                        $displayChoice->categorieChoice();
                                    ?>
                                </select>
                            </label>
                            <hr>
                            <section class="form-check form-switch">
                                <input class="form-check-input"  type="checkbox" id="flexSwitchCheckDefault hide" name="hide">
                                <label class="form-check-label" for="hide">Masquer produits indisponibles</label>
                            </section>
                            <hr>
                            <section>
                                <p>Prix</p>
                                <label>
                                    <select class="form-select" name="prix" >
                                        <option value="trier">Trier par</option>
                                        <option value="croissant" >Croissant</option>
                                        <option value="decroissant" >Décroissant</option>
                                    </select>
                                </label>
                            </section>
                            <hr>
                            <button class="valid btn btn-primary" type="submit" name="search" value="Go !">Rechercher</button>
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