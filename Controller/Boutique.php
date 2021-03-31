<?php
namespace Controller;

class Boutique
{
    /**
     * Permet d'afficher dans l'option le nom des catégories.
     */
    public function categorieChoice()
    {
        $displayCategorie = new \Model\Boutique();
        $option = $displayCategorie -> categorieChoice();

        $i = 0;
        foreach ($option as $value)
        {
            echo '<option value="'. $value[1] . '">' . $value[1] . '</option>';
        }
        $i++;
    }

    /**
     * Permet de gérer l'affichage des produits filtrés ou pas .
     */
    public function searchCategorie()
    {
        if(isset($_GET['search']))
        {
            $display = new \Model\Boutique();

            if(isset($_GET['prix']) && $_GET['prix'] === "croissant")
            {
                $result = $display->orderPrice("ASC");

                foreach ($result as $value)
                {
                    $_GET['id_produits'] = $value[0];

                    echo ('
                    <section class="product-container flex-items">
                        <section class="img-container">
                            <img class="img-produits" src='. $value[3] .'>
                            <section class="infos-hover">
                                <a class="title-product" href="produit.php?id=' . $value[0] . '"><i class="fa fa-eye"></i> <p>En savoir plus</p></a>
                            </section>
                        </section>
                        <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                        <p class="article-price">' . $value[2] . '€</p>
                  </section>');
                }
            }

            if(isset($_GET['prix']) && $_GET['prix'] === "decroissant")
            {
                $result = $display->orderPrice("DESC");

                foreach ($result as $value)
                {
                    $_GET['id_produits'] = $value[0];

                    echo ('
                    <section class="product-container flex-items">
                        <section class="img-container">
                            <img class="img-produits" src='. $value[3] .'>
                            <section class="infos-hover">
                                <a class="title-product" href="produit.php?id=' . $value[0] . '">
                                    <i class="fa fa-eye"></i>
                                    <p>En savoir plus</p>
                                </a>
                            </section>
                        </section>
                        <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                        <p class="article-price">' . $value[2] . '€</p>
                  </section>');
                }
            }

            if(isset($_GET['Choix']) != ($_GET['Choix'] ===  "Tous les produits"))
            {
                    $result = $display->searchCategorie($_GET['Choix']);

                    foreach ($result as $value)
                    {
                        $_GET['id_produits'] = $value[0];

                        echo ('
                        <section class="product-container flex-items">
                            <section class="img-container">
                                <img class="img-produits" src='. $value[3] .'>
                                <section class="infos-hover">
                                    <a class="title-product" href="produit.php?id=' . $value[0] . '">
                                        <i class="fa fa-eye"></i>
                                        <p>En savoir plus</p>
                                    </a>
                                </section>
                            </section>
                            <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                            <p class="article-price">' . $value[2] . '€</p>
                  </section>');
                    }
            }

            if(($_GET['Choix'] == "Tous les produits") && ($_GET['prix']) == "trier")
            {
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

                echo '<section class="product-container flex-items">
                    <section class="img-container">
                        <img class="img-produits" src='. $value[3] .'>
                        <section class="infos-hover">
                            <a class="title-product" href="produit.php?id=' . $value[0] . '">
                                <i class="fa fa-eye"></i>
                                <p>En savoir plus</p>
                            </a>
                        </section>
                    </section class="item-title-boutique">
                    <a class="title-product" href="produit.php?id=' . $value[0] . '"><h2>' . ucfirst($value[1]) . '</h2></a>
                    <p class="article-price">' . $value[2] . '€</p>
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


    /**
     * @return bool
     * Initialise la SESSION qui sert de panier.
     */

    public function creationPanier(){

        if (!isset($_SESSION['panier'])){

            $_SESSION['panier']=array();

        }
        return true;
    }


    /**
     * Permet d'ajouter l'article au panier.
     */

    public function addToCart(){

        if(isset($_POST['add'])) {

            $addCart = new \Model\Boutique();
            $addCart->addToCart($_GET['id']);

            echo'<section class="confirm-add alert alert-info" role="alert">
                            Votre article a bien été rajouté au <a href="paiement-form.php">panier</a>. 
                         </section>';
        }
    }


    /**
     * Ici nous affichons un panier vide ou les éléments qui ont étaient ajouter.
     */

    public function afficherPanier(){

        if(empty($_SESSION['panier'])){

            echo '<div class="text-center cart-vide alert alert-primary" role="alert">
                    Votre panier est <b>vide</b> !
                  </div>';
        }
        else{

            echo '<p><b>PANIER</b></p>
                    <hr>';
            foreach($_SESSION['panier'] as $value){

                echo " <section class='product-line'>
                        <img class='icon-img' src=" .$value['photo1']. ">
                        <p>".ucfirst($value['titre'])."</p>
                        <p class='price-line-product'>".$value['prix']."€</p>
                        
                   </section><br>";
            }
            echo "<form method='post' action=''>
                            <input class='btn btn-primary' type='submit' name='delet' value='Supprimer le panier'>
                        </form>";
        }
    }

    /**
     * Permet de récupérer le prix total du panier et de l'afficher dans une variable.
     */

    public function totalPrice(){

        $price = 0;

        $i = 0;

        if(isset($_SESSION['panier'])){

            foreach ($_SESSION['panier'] as $value){

                $convert = $_SESSION['panier'][$i]['prix'];

                $price += intval($convert);

                $i++;
            }
            echo " <input class='total-price' type='text' name='prix' id='prix' value='$price' readonly>";
        }
        else{
            echo " <input class='total-price' type='text' name='prix' id='prix' value='panier vide' readonly> ";

        }

        if (isset($_SESSION['utilisateur'])){

            if(isset($_SESSION['panier'])){

                echo '<button class="btn btn-primary" name="buyButton">Payer</button>';
            }
            else{
                echo '<button class="btn btn-primary" name="buyButton"><a href="boutique.php">Ajouter produits</a></button>';
            }
        }

        else{
            echo'<a href="connexion.php" class="btn btn-primary">Payer</a>';
        }
    }

    public function deletProduct(){

        if (isset($_POST['delet'])){

            unset($_SESSION['panier']);
        }
    }
}

?>