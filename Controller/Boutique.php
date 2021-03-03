<?php

namespace Controller;

class Boutique{

    /**
     * Permet d'ajouter un article au panier.
     * @return mixed
     */

    public function addTocart(){

        if(isset($_POST['hiddenAdd'])){

            $addTocart = new \Model\Boutique();
            $addTocart ->addTocart();

        }
    }

    public function categorieChoice(){

        $displayCategorie = new \Model\Boutique();
        $option= $displayCategorie->categorieChoice();

        $i=0;

        foreach ($option as $value){

            echo '<option value="'.$value[1].'">' . $value[1] . '</option>';

        }
        $i++;
    }

    public function searchCategorie(){

        if(isset($_GET['search'])){

            $display = new \Model\Boutique();
            $result = $display->searchCategorie($_GET['Choix']);


            foreach ($result as $value){

                $_GET['id_produits'] = $value[0];

                echo '<section class="flex-items">
                    <img class="img-produits" src='. $value[4] .'>
                    <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                    <p>'. $value[3] .'</p><p>' . $value[2] . '€</p>
                    <form method="post" name="add">
                    <input type="submit" name="add" value=" Ajouter au panier">
                    <input type="hidden" name="hiddenAdd" value="'. $value[0] .'">
                    </form>
                    </section>';
            }
            if($value['']){
                $affichageA = new \Model\Boutique();
                $affichageA ->displayAllProducts();
            }

        }
    }
}

?>