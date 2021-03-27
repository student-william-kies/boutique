<?php
namespace Controller;
require_once ('Controller.php');
require ('../../Model/Boutique.php');
require ('../../Model/Product.php');

class Product extends Controller
{
    public function displayNewProducts()
    {
        $display = new \Model\Boutique();
        $display -> getLastProducts();
    }

    public function selectingOneProduct()
    {
        $productManager = new \Model\Product();
        $thisProduct = $productManager -> selectOneProduct($_GET['id_produits']);

        var_dump($thisProduct);
        echo ('<form action="" method="post">
                    <label>
                        Titre
                        <input type="text" value="' . $thisProduct['titre'] . '" name="titleProduct">
                    </label>
                     <label>
                        Description
                        <input type="text" value="' . $thisProduct['description'] . '" name="descProduct">
                    </label>
                     <label>
                        Prix
                        <input type="text" value="' . $thisProduct['prix'] . '" name="priceProduct">
                    </label>
                     <label>
                        Quantité en Stock
                        <input type="number" value="' . $thisProduct['quantite_stock'] . '" name="qteProduct">
                    </label>
                    <label>
                        Photo 1 (Sert d\'icone)
                        <input type="text" value="' . $thisProduct['photo1'] . '" name="photo1Product">
                    </label>
                    <label>
                        Photo 2
                        <input type="text" value="' . $thisProduct['photo2'] . '" name="photo2Product">
                    </label>
                    <label>
                        Photo 3
                        <input type="text" value="' . $thisProduct['photo3'] . '" name="photo3product">
                    </label>
                    <section>
                        <label>
                            <button type="submit" class="btn btn-success" name="updateThisProduct">Mettre à jour</button>
                        </label>
                        <label>
                            <button type="submit" class="btn btn-danger" name="deleteThisProduct">Supprimer</button>
                        </label>
                    </section>
                </form>');
    }

    public function updatingProducts()
    {
        $update = new \Model\Product();
        $update -> updateOneProduct($_GET['id_produits'], $_POST['titleProduct'], $_POST['descProduct'], $_POST['priceProduct'], $_POST['qteProduct'], $_POST['photo1Product'], $_POST['photo2Product'], $_POST['photo3product']);
    }
}