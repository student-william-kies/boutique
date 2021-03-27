<?php

namespace Controller;

class Boutique{

    /**
     * Permet d'afficher dans l'option le nom des catégories.
     */

    public function categorieChoice(){

        $displayCategorie = new \Model\Boutique();
        $option= $displayCategorie->categorieChoice();

        $i=0;

        foreach ($option as $value){

            echo '<option value="'.$value[1].'">' . $value[1] . '</option>';

        }
        $i++;
    }


    /**
     * Permet de gérer l'affichage des produits filtrés ou pas.
     */

    public function searchCategorie(){

        if(isset($_GET['search'])){

            $display = new \Model\Boutique();

            if(isset($_GET['prix']) && $_GET['prix'] === "croissant"){

                $result = $display->orderPrice("ASC");

                foreach ($result as $value){

                    $_GET['id_produits'] = $value[0];

                    echo '<section class="product-container flex-items">
                    <section class="img-container">
                        <img class="img-produits" src='. $value[3] .'>
                        <section class="infos-hover">
                            <a class="title-product" href="produit.php?id=' . $value[0] . '">
                                <i class="fa fa-eye"></i>
                                <p>En savoir plus</p>
                            </a>
                        </section>
                    </section class="item-title-boutique">
                    <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                    <p class="article-price">' . $value[2] . '€</p>
                  </section>';
                }
            }
            if(isset($_GET['prix']) && $_GET['prix'] === "decroissant"){

                $result = $display->orderPrice("DESC");

                foreach ($result as $value){

                    $_GET['id_produits'] = $value[0];

                    echo '<section class="product-container flex-items">
                    <section class="img-container">
                        <img class="img-produits" src='. $value[3] .'>
                        <section class="infos-hover">
                            <a class="title-product" href="produit.php?id=' . $value[0] . '">
                                <i class="fa fa-eye"></i>
                                <p>En savoir plus</p>
                            </a>
                        </section>
                    </section class="item-title-boutique">
                    <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                    <p class="article-price">' . $value[2] . '€</p>
                  </section>';
                }
            }
            if(isset($_GET['Choix']) != ($_GET['Choix'] ===  "Tous les produits")){

                    $result = $display->searchCategorie($_GET['Choix']);

                    foreach ($result as $value){

                        $_GET['id_produits'] = $value[0];

                        echo '<section class="product-container flex-items">
                    <section class="img-container">
                        <img class="img-produits" src='. $value[3] .'>
                        <section class="infos-hover">
                            <a class="title-product" href="produit.php?id=' . $value[0] . '">
                                <i class="fa fa-eye"></i>
                                <p>En savoir plus</p>
                            </a>
                        </section>
                    </section class="item-title-boutique">
                    <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                    <p class="article-price">' . $value[2] . '€</p>
                  </section>';
                    }
            }

            if(($_GET['Choix'] == "Tous les produits") && ($_GET['prix']) == "trier"){

                $displayAll = new \Model\Boutique();
                $displayAll->displayAllProducts();
            }
        }
        if((!isset($_GET['prix'])) && (!isset($_GET['Choix'])) && (!isset($_GET['search']))){
            $displayAll = new \Model\Boutique();
            $displayAll->displayAllProducts();
        }
    }


    /**
     * Permet de trier les produits par ordre croissant ou décroissant
     */

    public function searchCategorieWithPrice(){

        $test = new \Model\Boutique();

        if (isset($_GET['prix']) && $_GET['prix'] === "Croissant"){

            $test->orderPrice('ASC');
        }
        elseif (isset($_GET['prix']) && $_GET['prix'] === "Décroissant"){

            $test->orderPrice('DESC');
        }
    }


    /**
     * Permet d'afficher les articles d'une catégorie en masquant ceux qui sont indiponibles.
     */

   public function hideSearchCategorieWithCat(){

        if(isset($_GET['search'])){

            $test = new \Model\Boutique();
            $result=$test->hideProductWithCat($_GET['Choix']);

            foreach($result as $value){

                $_GET['id_produits'] = $value[0];

                echo '<section class="product-container flex-items">
                    <section class="img-container">
                        <img class="img-produits" src='. $value[3] .'>
                        <section class="infos-hover">
                            <a class="title-product" href="produit.php?id=' . $value[0] . '">
                                <i class="fa fa-eye"></i>
                                <p>En savoir plus</p>
                            </a>
                        </section>
                    </section class="item-title-boutique">
                    <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                    <p class="article-price">' . $value[2] . '€</p>
                  </section>';
            }
        }
   }


    /**
     * Permet d'afficher tous les articles disponible.
     */

    public function hideSearchCategorieWithoutCat(){

        if(isset($_GET['search']) && ($_GET['Choix'] === "Tous les produits") && (isset($_GET['hide']))){

            $displayAll = new \Model\Boutique();
            $displayAll->hideProductWithoutCat();

        }
    }
}

?>