<?php

namespace Model;

require_once ('Model.php');

class Boutique extends \Model{

    /**
     * Permet d'afficher les 3 derniers produits.
     * @return mixed
     */

    public function getLastProducts(){

        $last = $this->pdo-> query("SELECT * FROM `produits` ORDER BY id_produit DESC LIMIT 3");

        while ($count = $last->fetch(\PDO::FETCH_ASSOC)){

            $_GET['id'] = @$count['id'];

            echo '<section class="last-articles"><a href=""><h2>' .ucfirst($count['nom']). '</h2><p>' .$count['prix']. '€</p></a></section>';

        }
        return $count;
    }
}

?>