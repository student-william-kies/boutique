<?php
namespace Model;
require_once ('Model.php');

class User extends \Model
{
    /**
     * Permet de vérifier si les données entrer en paramètres sont déjà présentes en base de données
     *
     * @param $table
     * @param $column
     * @param $var
     * @return false|\PDOStatement
     */
    public function alreadyUsed($table, $column, $var): bool|\PDOStatement
    {
        $query = $this -> pdo -> prepare('SELECT ' . $column . ' FROM ' . $table . ' WHERE ' . $column . ' = ' . $var);
        $query -> execute();

        return $query;
    }

    public function insert($prenom, $nom, $password, $email, $phone, $address, $city, $codep, $id_droits): bool|\PDOStatement
    {
        $query = $this -> pdo -> prepare("INSERT INTO utilisateurs (prenom, nom, password, email, telephone, adresse, ville, codep, id_droits)
                                                            VALUES (:prenom, :nom, :password, :email, :phone, :adresse, :ville, :codep, :droit)");
        $query -> execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "password" => $password,
            "email" => $email,
            "phone" => $phone,
            "adresse" => $address,
            "ville" => $city,
            "codep" => $codep,
            "droit" => $id_droits
        ]);

        return $query;
    }
}