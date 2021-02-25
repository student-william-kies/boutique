<?php
namespace Model;
use PDOStatement;

require_once ('Model.php');

class User extends \Model
{
    /**
     * Permet de vérifier si les données entrer en paramètres sont déjà présentes en base de données
     *
     * @param $table
     * @param $column
     * @param $var
     * @return mixed
     */
    public function alreadyUsed($table, $column, $var)
    {
        $query = $this -> pdo -> prepare(" SELECT " . $column . " FROM " . $table . " WHERE " . $column . " = ?");
        $query -> execute([
            $var
        ]);

        return $query -> fetch(\PDO::FETCH_ASSOC);
    }

    public function getEmail($var)
    {
        $query = $this -> pdo -> prepare("SELECT email FROM utilisateurs WHERE email = :email");
        $query -> execute([
            "email" => $var
        ]);

        $result = $query -> fetchAll(\PDO::FETCH_ASSOC);
        return $result[0]['email'];
    }

    /**
     * Enregistre un utilisateur en base de données
     *
     * @param $prenom
     * @param $nom
     * @param $password
     * @param $email
     * @param $phone
     * @param $address
     * @param $city
     * @param $codep
     * @param $id_droits
     * @return false|PDOStatement
     */
    public function insert($prenom, $nom, $password, $email, $phone, $address, $city, $codep, $id_droits)
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