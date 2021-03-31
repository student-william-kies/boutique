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

        if (isset($_POST['updateThisProduct']))
        {
            $this -> updatingProducts();
        }

        if (isset($_POST['deleteThisProduct']))
        {
            $this -> deletingProducts();
        }
    }

    public function selectingOneCat()
    {
        $catManager = new \Model\Product();
        $thisCat = $catManager -> selectOneCat($_GET['id_categorie']);

        echo ('<form action="" method="post">
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Nom</p>
                            <input type="text" value="' . $thisCat['nom'] . '" name="nomCat" class="form-control">
                        </label>
                    <section class="mb-3">
                        <label class="form-label">
                            <button type="submit" class="btn btn-success" name="updateThisCat">Mettre à jour</button>
                        </label>
                        <label class="form-label">
                            <button type="submit" class="btn btn-danger" name="deleteThisCat">Supprimer</button>
                        </label>
                    </section>
                </form>');

        if (isset($_POST['updateThisCat']))
        {
            $this -> updatingCat();
        }

        if (isset($_POST['deleteThisCat']))
        {
            $this -> deletingCat();
        }
    }

    public function updatingProducts()
    {
        $update = new \Model\Product();
        $update -> updateOneProduct($_GET['id_produits'], $_POST['titleProduct'], $_POST['descProduct'], $_POST['priceProduct'], $_POST['qteProduct'], $_POST['photo1Product'], $_POST['photo2Product'], $_POST['photo3product']);

        Http::redirect('admin.php');
    }

    public function updatingCat()
    {
        $update = new \Model\Product();
        $update -> updateOneCat($_GET['id_categorie'], $_POST['nomCat']);

        Http::redirect('admin.php');
    }

    public function deletingProducts()
    {
        $delete = new \Model\Product();
        $delete -> deleteOneProduct($_GET['id_produits']);

        Http::redirect('admin.php');
    }

    public function deletingCat()
    {
        $delete = new \Model\Product();
        $delete -> deleteOneCat($_GET['id_categorie']);

        Http::redirect('admin.php');
    }

    public function displayCreatingProduct()
    {
        echo ('<form action="" method="post">
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Catégorie</p>
                            <input type="number" name="newCatProduct" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Titre</p>
                            <input type="text" name="newTitleProduct" class="form-control">
                        </label>
                        <label class="form-label">
                            <p class="form-text">Description</p>
                            <input type="text" name="newDescProduct" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Prix</p>
                            <input type="text" name="newPriceProduct" class="form-control">
                        </label>
                         <label class="form-label">
                            <p class="form-text">Quantité en Stock</p>
                            <input type="number" name="newQteProduct" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Photo du produits (<i>Liens des images</i>)</p>
                            <input type="text" name="newPhoto1Product" class="form-control">
                        </label>
                        <label class="form-label">
                            <input type="text" name="newPhoto2Product" class="form-control">
                        </label>
                        <label class="form-label">
                            <input type="text" name="newPhoto3Product" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <button type="submit" class="btn btn-success" name="createThisProduct">Ajouter</button>
                        </label>
                    </section>
                </form>');

        if (isset($_POST['createThisProduct']))
        {
            $this -> creatingProducts($_POST['newCatProduct'], $_POST['newTitleProduct'], $_POST['newDescProduct'], $_POST['newPriceProduct'], $_POST['newQteProduct'], $_POST['newPhoto1Product'], $_POST['newPhoto2Product'], $_POST['newPhoto3Product']);
        }
    }

    public function creatingProducts($id_cat, $titre, $desc, $prix, $qteStock, $photo1, $photo2, $photo3)
    {
        $this -> secure($id_cat);
        $this -> secure($titre);
        $this -> secure($desc);
        $this -> secure($prix);
        $this -> secure($qteStock);
        $this -> secure($photo1);
        $this -> secure($photo2);
        $this -> secure($photo3);

        if (!empty($id_cat) && !empty($titre) && !empty($desc) && !empty($prix) && !empty($qteStock) && !empty($photo1) && !empty($photo2) && !empty($photo3))
        {
            $create = new \Model\Product();
            $create -> createProducts($id_cat, $titre, $desc, $prix, $qteStock, $photo1, $photo2, $photo3);

            Http::redirect('admin.php');
        } else echo $log = ('<p>Erreur : Veuillez remplir le formulaire.</p>');
    }

    public function displayCreatingCat()
    {
        echo ('<form action="" method="post">
                    <section class="mb-3">
                        <label class="form-label">
                            <p class="form-text">Nom</p>
                            <input type="text" name="newNomCat" class="form-control">
                        </label>
                    </section>
                    <section class="mb-3">
                        <label class="form-label">
                            <button type="submit" class="btn btn-success" name="createThisCat">Ajouter</button>
                        </label>
                    </section>
                </form>');

        if (isset($_POST['createThisCat']))
        {
            $this -> creatingCats($_POST['newNomCat']);
        }
    }

    public function creatingCats($nom)
    {
        $this -> secure($nom);

        if (!empty($nom))
        {
            $create = new \Model\Product();
            $create -> createCat($nom);

            Http::redirect('admin.php');
        } else echo $log = "<p>Erreur : Veuillez remplir le formulaire.</p>";
    }
}