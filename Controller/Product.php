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

        echo ('<form action="" method="post">
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Titre</p>
                            <input type="text" value="' . $thisProduct['titre'] . '" name="titleProduct" class="form-control">
                        </label>
                        <label class="form-label">
                            <p class="form-text">Description</p>
                            <input type="text" value="' . $thisProduct['description'] . '" name="descProduct" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Prix</p>
                            <input type="text" value="' . $thisProduct['prix'] . '" name="priceProduct" class="form-control">
                        </label>
                         <label class="form-label">
                            <p class="form-text">Quantité en Stock</p>
                            <input type="number" value="' . $thisProduct['quantite_stock'] . '" name="qteProduct" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Photo du produits (<i>Liens des images</i>)</p>
                            <input type="text" value="' . $thisProduct['photo1'] . '" name="photo1Product" class="form-control">
                        </label>
                        <label class="form-label">
                            <input type="text" value="' . $thisProduct['photo2'] . '" name="photo2Product" class="form-control">
                        </label>
                        <label class="form-label">
                            <input type="text" value="' . $thisProduct['photo3'] . '" name="photo3product" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <button type="submit" class="btn btn-success" name="updateThisProduct">Mettre à jour</button>
                        </label>
                        <label class="form-label">
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