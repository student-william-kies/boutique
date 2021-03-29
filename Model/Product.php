<?php
namespace Model;
require_once ('Model.php');

class Product extends \Model
{
    public function displayManageProduct(): array
    {
        $query = $this -> pdo -> prepare("SELECT * FROM Produits");
        $query -> execute();

        return $query -> fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectOneProduct($id_produit)
    {
        $query = $this -> pdo -> prepare("SELECT * FROM produits WHERE id_produits = :id");
        $query -> execute([
            "id" => $id_produit
        ]);
        $result = $query -> fetch(\PDO::FETCH_ASSOC);
        $_GET['products'] = $result;

        return $result;
    }

    public function updateOneProduct($id_produit, $title, $desc, $price, $qteStock, $photo1, $photo2, $photo3)
    {
        $query = $this -> pdo -> prepare("UPDATE produits SET titre = :titre, description = :description, prix = :prix, quantite_stock = :qteStock, photo1 = :img1, photo2 = :img2, photo3 = :img3 WHERE id_produits = :id");
        $query -> execute([
           "titre" => $title,
           "description" => $desc,
           "prix" => $price,
           "qteStock" => $qteStock,
           "img1" => $photo1,
           "img2" => $photo2,
           "img3" => $photo3,
            "id" => $id_produit
        ]);
    }

    public function createProducts($id_cat, $titre, $desc, $prix, $qteStock, $photo1, $photo2, $photo3)
    {
        $query = $this -> pdo -> prepare("INSERT INTO produits (id_cat, titre, description, prix, quantite_stock, stock_status, photo1, photo2, photo3)
                                                        VALUES (:id_cat, :titre, :description, :prix, :qteStock, :stockStats, :photo1, :photo2, :photo3)");
        $query -> execute([
            "id_cat" => $id_cat,
            "titre" => $titre,
            "description" => $desc,
            "prix" => $prix,
            "qteStock" => $qteStock,
            "stockStats" => '',
            "photo1" => $photo1,
            "photo2" => $photo2,
            "photo3" => $photo3
        ]);

        return $query;
    }
}