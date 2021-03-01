<?php

namespace Model;

require_once ('Model.php');

class Boutique extends \Model{

    /**
     * Permet de sélectionner les 3 derniers produits.
     * @return mixed
     */

    public function getLastProducts(){

        $last = $this->pdo-> query("SELECT * FROM `produits` ORDER BY id_produits DESC LIMIT 3");

        while ($count = $last->fetch(\PDO::FETCH_ASSOC)){

            $_GET['id'] = @$count['id'];

            echo '<section class="last-articles"><a href=""><h2>' .ucfirst($count['nom']). '</h2><p>' .$count['prix']. '€</p></a></section>';

        }
        return $count;
    }


    /**
     * Permet de sélectionner tous les produits.
     * @return mixed
     */

    public function selectAllProduct($id){

        $query = $this->pdo-> prepare("SELECT id_produits FROM produits WHERE id_produits= :id");
        $query->execute([
            'id'=>$id
        ]);

        $result = $query->fetch(\PDO::FETCH_ASSOC);

        $_GET['id_produits'] = $result['id_produits'];

        var_dump($_GET['id_produits']);

        return $result;


    }


    /**
     * Permet de compter et sélectionener tous les produits. Et par la suite créer la pagination.
     * @return mixed
     */

    public function getAllProducts(){

        //Permet de compter tous les produits et de les assigner à une variable afin d'initier la pagination.

        $query = $this->pdo-> prepare("SELECT COUNT(id_produits) as nbArt FROM produits");
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

        $query = $this->pdo-> prepare("SELECT * FROM `produits` ORDER BY id_produits DESC LIMIT ".(($cPage-1)*$perPage).",$perPage");
        $query->execute();
        $article = $query->fetchAll(\PDO::FETCH_ASSOC);

        foreach($article as $articles) {

            $_GET['id_produits'] = $articles['id_produits'];

            echo '<section class="flex-items">
                    <a href="produit.php?id=' . $_GET['id_produits'] . '"><h2>' . ucfirst($articles['nom']) . '</h2></a>
                    <p>' . $articles['prix'] . '€</p>
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
                echo " <section class='pageNumber'><a c href=\"boutique.php?p=$i\">$i</a>  </section> ";
            }
        }

    }


    /**
     * Permet d'ajouter un article au panier.
     * @return mixed
     */

    public function addTocart(){

        // On récupère ici tous les articles.

        $query = $this->pdo-> query("SELECT id_produits, prix, quantite_stock FROM produits");
        $articles = $query->fetchAll();

        $_GET[1]['id_produits'] = $articles[1]['id_produits'];
        $_GET[1]['prix'] = $articles[1]['prix'];
        $_GET[1]['quantite_stock'] = $articles[1]['quantite_stock'];


        $query2 = $this->pdo->prepare("INSERT INTO panier (id_produit, prix, quantite) VALUES (:id_produits, :prix, :quantite_stock)");
        $query2->execute([
            'id_produits'=> $_GET[1]['id_produits'],
            'prix'=> $_GET[1]['prix'],
            'quantite_stock'=> 1
        ]);
    }


    /**
     * Permet de récupérer les photos en bdd et les assignées à l'id de l'article correspondant.
     * @return mixed
     */

    public function displayImage($url){

        $query = $this->pdo-> prepare("SELECT :chemin FROM photos WHERE id_produit= :id");
        $query->execute([
            'chemin'=>$url,
            'id'=>$_GET['id']
        ]);

        return $query->fetch();

    }
}

?>