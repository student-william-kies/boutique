<?php

namespace Model;

require_once ('Model.php');

class Boutique extends \Model{

    /**
     * Permet de sélectionner les 3 derniers produits.
     *
     * @return mixed
     */

    public function getLastProducts(){

        $last = $this->pdo-> query("SELECT * FROM `produits` ORDER BY id_produits DESC LIMIT 3");

        while ($count = $last->fetch(\PDO::FETCH_ASSOC)){

            $_GET['id_produits'] = $count['id_produits'];

            echo '<section class="last-articles">
                    <a href="produit.php?id=' . $_GET['id_produits'] . '">
                    <img class="img-newProduits" src='. $count['photo1'] .'>
                    <h2>' .ucfirst($count['titre']). '</h2><p>' .$count['prix']. '€</p>
                    </a>
                    </section>';

        }
        return $count;
    }


    /**
     * Permet d'afficher tous les articles avec le système de pagination.
     *
     */

    public function displayAllProducts(){

        //Permet de compter tous les produits et de les assigner à une variable afin d'initier la pagination.

        $data = $this->pdo-> query("SELECT COUNT(id_produits) as nbArt FROM produits")->fetch(\PDO::FETCH_ASSOC);

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

        $article = $this->pdo-> query("SELECT * FROM `produits` ORDER BY id_produits DESC LIMIT ".(($cPage-1)*$perPage).",$perPage")->fetchAll(\PDO::FETCH_ASSOC);

        foreach($article as $articles) {

            $_GET['id_produits'] = $articles['id_produits'];

            echo '<section class="flex-items">
                    <img class="img-produits" src='. $articles['photo1'] .'>
                    <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($articles['titre']) . '</h2></a>
                    <p>'. $articles['stock_status'] .'</p><p>' . $articles['prix'] . '€</p>
                    <form method="post" name="add">
                    <input type="submit" name="add" value=" Ajouter au panier">
                    <input type="hidden" name="hiddenAdd" value="'. $articles['id_produits'] .'">
                    </form>
                    </section>';
        }

        //On affiche ici notre pagination.

        for($i=1; $i<=$nbPage; $i++){

            if($i==$cPage){
                echo "<section class='pageNumber'><a class='pageNumber'>$i</a></section>";
            }
            else{
                echo " <section class='pageNumber'><a href=\"boutique.php?p=$i\">$i</a>  </section> ";
            }
        }
    }


    /**
     * Permet d'intégrer les catégories dans les options de filtres.
     *
     * @return array
     */

    public function categorieChoice(){

        $sql = "SELECT * FROM categories";

        $query=$this->pdo->prepare($sql);
        $query->execute();

        $i=0;

        while ($result = $query->fetch(\PDO::FETCH_ASSOC)){

            $tab[$i][]=$result['id_categorie'];
            $tab[$i][]=$result['nom'];
            $i++;
        }
        return $tab;
    }


    /**
     * Permet de selectionner les articles d'intégrer les catégories dans les options de filtres.
     *
     * @param $nom
     * @return array
     */

    public function searchCategorie($nom){

        $sql = "SELECT * FROM produits AS p INNER JOIN categories AS c ON c.nom=:nom WHERE p.id_cat = c.id_categorie";

        $result = $this->pdo-> prepare($sql);
        $result->bindValue(':nom', $nom);

        $result->execute();

        $i =0;

            while ($fetch = $result->fetch(\PDO::FETCH_ASSOC)){

                $tableau[$i][] = $fetch['id_produits'];
                $tableau[$i][] = $fetch['titre'];
                $tableau[$i][] = $fetch['prix'];
                $tableau[$i][] = $fetch['stock_status'];
                $tableau[$i][] = $fetch['photo1'];

                $i++;
            }
            return $tableau;
    }



    //REPRENDRE ICI
    public function quantityChoice(){

        $stockDispo = $this->pdo-> query("SELECT * FROM `produits` WHERE quantite_stock > 0");

        $i =0;

        while ($count = $stockDispo->fetch(\PDO::FETCH_ASSOC)){

            $tableau[$i][] = $count['id_produits'];
            $tableau[$i][] = $count['titre'];
            $tableau[$i][] = $count['prix'];
            $tableau[$i][] = $count['stock_status'];
            $tableau[$i][] = $count['photo1'];

            $i++;
        }
        var_dump($tableau);
        return $tableau;


    }

















    //A REVOIR 04/03/2021
    /**
     * Permet d'ajouter un article de la page boutique directement dans le panier.
     *
     */

    public function addToCart(){

        $allProducts = $this->pdo-> query("SELECT * FROM produits");
        $test = $allProducts->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($test);

        $query = $this->pdo->prepare("INSERT INTO panier (id_produit) VALUES (:id_produits)");
        $query->execute([
            'id_produits'=> $_GET['id_produits']
        ]);

        var_dump($_GET['id_produits']);
    }
}

?>