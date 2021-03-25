<?php
namespace Model;
use Controller\Http;
use PDOStatement;

require_once ('Model.php');
class Product extends \Model
{
    public function displayManageProduct()
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
}