<?php

namespace Controller;



class Boutique{

    /**
     * Permet de sélectionener tous les produits. Et par la suite créer la pagination.
     * @return mixed
     */

    public function getAllProducts(){

        $allProducts = new \Model\Boutique();
        $allProducts ->getAllProducts();
    }


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


    /**
     * Permet d'afficher les images.
     * @return mixed
     */

    public function displayImage(){

        //Dans un premier temps on récupère l'article lié à la page.

        $result = new \Model\Boutique();
        $result->selectAllProduct($_GET['id']);

        // Appeler displayImage du model

    }
}

?>