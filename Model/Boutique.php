<?php

namespace Model;

require_once('Model.php');

class Produits extends Model{

    /**
     * Permet d'afficher les 3 derniers produits.
     * @return mixed
     */

    public function last(){

        $sql = "SELECT * FROM `produits` ORDER BY id_produit DESC LIMIT 3";
        $last = $this->pdo-> prepare("$sql");
        $last -> execute();
    }
}

?>