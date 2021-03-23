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

                    echo '<section class="flex-items">
                        <img class="img-produits" src=' . $value[4] . '>
                        <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                        <p>' . $value[3] . '</p><p>' . $value[2] . '€</p>
                        <form method="post" name="add">
                        <input type="submit" name="add" value=" Ajouter au panier">
                        <input type="hidden" name="hiddenAdd" value="' . $value[0] . '">
                        </form>
                        </section>';
                }
            }
            if(isset($_GET['prix']) && $_GET['prix'] === "decroissant"){

                $result = $display->orderPrice("DESC");

                foreach ($result as $value){

                    $_GET['id_produits'] = $value[0];

                    echo '<section class="flex-items">
                        <img class="img-produits" src=' . $value[4] . '>
                        <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                        <p>' . $value[3] . '</p><p>' . $value[2] . '€</p>
                        <form method="post" name="add">
                        <input type="submit" name="add" value=" Ajouter au panier">
                        <input type="hidden" name="hiddenAdd" value="' . $value[0] . '">
                        </form>
                        </section>';
                }
            }
            if(isset($_GET['Choix']) != ($_GET['Choix'] ===  "Tous les produits")){

                    $result = $display->searchCategorie($_GET['Choix']);

                    foreach ($result as $value){

                        $_GET['id_produits'] = $value[0];

                        echo '<section class="flex-items">
                        <img class="img-produits" src=' . $value[4] . '>
                        <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                        <p>' . $value[3] . '</p><p>' . $value[2] . '€</p>
                        <form method="post" name="add">
                        <input type="submit" name="add" value=" Ajouter au panier">
                        <input type="hidden" name="hiddenAdd" value="' . $value[0] . '">
                        </form>
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

                echo '<section class="flex-items">
                        <img class="img-produits" src=' . $value[4] . '>
                        <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                        <p>' . $value[3] . '</p><p>' . $value[2] . '€</p>
                        <form method="post" name="add">
                        <input type="submit" name="add" value=" Ajouter au panier">
                        <input type="hidden" name="hiddenAdd" value="' . $value[0] . '">
                        </form>
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