<?php
namespace Model;
require_once ('Model.php');

class Ordered extends \Model
{
    public function getOrder($prenom, $nom, $email, $tel, $adresse, $ville, $codep, $titre, $prix, $id_user)
    {
        $query = $this -> pdo -> prepare("INSERT INTO commandes (prenom, nom, email, telephone, adresse, ville, codep, titre, prix, id_user)
                                          VALUES (:prenom, :nom, :email, :tel, :adresse, :ville, :codep, :titre, :prix, :id_user)");
        $query -> execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "email" => $email,
            "tel" => $tel,
            "adresse" => $adresse,
            "ville" => $ville,
            "codep" => $codep,
            "titre" => $titre,
            "prix" => $prix,
            "id_user" => $id_user
        ]);

        return $query;
    }

    public function displayOrder($id_user)
    {
        $query = $this -> pdo -> prepare("SELECT * FROM commandes WHERE id_user = :id_user");
        $query -> execute([
            "id_user" => $id_user
        ]);

        return $query -> fetchAll();
    }
}