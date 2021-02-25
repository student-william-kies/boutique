<?php

namespace Controller;



class Boutique{

    public function getAllProducts(){

        /**
         * Permet de sélectionener tous les produits. Et par la suite créer la pagination.
         * @return mixed
         */

        $allProducts = new \Model\Boutique();
        $allProducts ->getAllProducts();
    }

    public function addTocart(){

        /**
         * Permet d'ajouter un article au panier.
         * @return mixed
         */

        if(isset($_POST['add'])){

            $addTocart = new \Model\Boutique();
            $addTocart ->addTocart();

        }
    }
}

?>