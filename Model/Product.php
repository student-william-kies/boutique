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

    public function modifyOneProduct($id_produit)
    {
        $query = $this -> pdo -> prepare("SELECT * FROM produits WHERE id_produits = :id");
        $query -> execute([
            "id" => $id_produit
        ]);
        $result = $query -> fetch(\PDO::FETCH_ASSOC);
        $_GET['products'] = $result;

        return $result;
    }
}