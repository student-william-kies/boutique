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

    }
}

?>