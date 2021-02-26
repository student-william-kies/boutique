<?php

namespace Model;

require_once ('Model.php');

class Boutique extends \Model{

    /**
     * Permet de sélectionner les 3 derniers produits.
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

    public function getAllProducts(){

        /**
         * Permet de sélectionener tous les produits. Et par la suite créer la pagination.
         * @return mixed
         */

        //Permet de compter tous les produits et de les assigner à une variable afin d'initier la pagination.

        $query = $this->pdo-> prepare("SELECT COUNT(id_produit) as nbArt FROM produits");
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        $nbArt = $data['nbArt'];
        $perPage = 9;
        $cPage =1;
        $nbPage = ceil($nbArt/$perPage);

        //Sécurisation de la pagination.

        if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<= $nbPage){

            $cPage = $_GET['p'];
        }
        else{
            $cPage =1;
        }

        //On récupère ici tous les articles et on les affiches avec une limite définie au dessus par page.

        $query = $this->pdo-> prepare("SELECT * FROM `produits` ORDER BY id_produit DESC LIMIT ".(($cPage-1)*$perPage).",$perPage");
        $query->execute();
        $article = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach($article as $articles) {

            $_GET['id_produit'] = @$articles['id_produit'];

            echo '<section class="flex-items">
                    <a href="produit.php?id=' . $_GET['id_produit'] . '"><h2>' . ucfirst($articles['nom']) . '</h2></a>
                    <p>' . $articles['prix'] . '€</p>
                    <form method="post" name="add">
                    <input type="submit" name="add" value=" Ajouter au panier">
                    <input type="hidden" name="hiddenAdd" value="'. $articles['id_produit'] .'">
                    </form>
                    </section>';
        }


        //On affiche ici notre pagination.

        for($i=1; $i<=$nbPage; $i++){

            if($i==$cPage){
                echo "<section class='pageNumber'><a class='pageNumber'>$i</a></section>";
            }
            else{
                echo " <section class='pageNumber'><a c href=\"boutique.php?p=$i\">$i</a>  </section> ";
            }
        }

    }

    public function addTocart(){

        /**
         * Permet d'ajouter un article au panier.
         * @return mixed
         */

        // On récupère ici tous les articles.

        $query = $this->pdo-> prepare("SELECT id_produit FROM `produits`");
        $query->execute();
        $articles = $query->fetch(\PDO::FETCH_ASSOC);

        $_GET['id_produit'] = @$articles['id_produit'];

        var_dump($articles);


        $query2 = $this->pdo->prepare("INSERT INTO `panier` ('id_produit') VALUES (:id_produit)");
        $query2 ->bindValue('id_produit', $articles['id_produit'], \PDO::PARAM_INT);
        $query2->execute([
            'id_produit'=> $articles['id_produit']
        ]);

    }
}

?>