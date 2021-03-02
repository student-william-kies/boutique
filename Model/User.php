<?php
namespace Model;
use Controller\Http;
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
        $query = $this->pdo->prepare("SELECT " . $column . " FROM " . $table . " WHERE " . $column . " = :var");
        $query -> execute([
            "var" => $var
        ]);

        return $query -> fetch();
    }

    /**
     * Permet d'attribuer les données utilisateurs de base non modifiées
     *
     * @param $table
     * @param $column
     * @param $var
     */
    public function emptyValue($table, $column, $var)
    {
        $query = $this -> pdo -> prepare("UPDATE " . $table . " SET " . $column . " = :var WHERE id = :id");
        $query -> execute([
            "var" => $var,
            "id" => $_SESSION['id']
        ]);
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
    public function insertUser($prenom, $nom, $password, $email, $phone, $address, $city, $codep, $id_droits)
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

    /**
     * Connecte un utilisateur inscrit en base de données
     *
     * @param $email
     * @param $password
     */
    public function connect($email, $password)
    {
        $getPassword = $this -> pdo -> prepare("SELECT password FROM utilisateurs WHERE email = :email");
        $getPassword -> execute([
            "email" => $email
        ]);

        $result = $getPassword -> fetch();

        if ($result)
        {
            $checkPassword = $result['password'];

            if (password_verify($password, $checkPassword))
            {
                $data = $this -> pdo -> prepare("SELECT * FROM utilisateurs WHERE email = :email AND password = :password");
                $data -> execute([
                    "email" => $email,
                    "password" => $checkPassword
                ]);

                $infoUser = $data -> fetch(\PDO::FETCH_ASSOC);

                if ($data -> rowCount())
                {
                    $_SESSION['id'] = $infoUser['id'];
                    $_SESSION['prenom'] = $infoUser['prenom'];
                    $_SESSION['nom'] = $infoUser['nom'];
                    $_SESSION['password'] = $infoUser['password'];
                    $_SESSION['email'] = $infoUser['email'];
                    $_SESSION['telephone'] = $infoUser['telephone'];
                    $_SESSION['adresse'] = $infoUser['adresse'];
                    $_SESSION['ville'] = $infoUser['ville'];
                    $_SESSION['codep'] = $infoUser['codep'];
                    $_SESSION['id_droits'] = $infoUser['id_droits'];

                    Http::redirect('home.php');
                }
            } else echo $log = "<p>Erreur: Mot de passe incorrect.</p>";
        } else echo $log = "<p>Erreur: Utilisateur introuvable.</p>";
    }

    /**
     * Permet à l'utilisateur de modifier ses informations personnelles
     *
     * @param $prenom
     * @param $nom
     * @param $email
     * @param $password
     */
    public function update($prenom, $nom, $email, $password)
    {
        $query = $this -> pdo -> prepare("UPDATE utilisateurs SET prenom = :prenom, nom = :nom, email = :email, password = :password WHERE id = :id");
        $query -> execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "email" => $email,
            "password" => $password,
            "id" => $_SESSION['id']
        ]);

        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    }

    public function updateAddress($phone, $address, $city, $codep)
    {
        $query = $this -> pdo -> prepare("UPDATE utilisateurs SET telephone = :phone, adresse = :adresse, ville = :ville, codep = :codep WHERE id = :id");
        $query -> execute([
            "phone" => $phone,
            "adresse" => $address,
            "ville" => $city,
            "codep" => $codep,
            "id" => $_SESSION['id']
        ]);

        $_SESSION['telephone'] = $phone;
        $_SESSION['adresse'] = $address;
        $_SESSION['ville'] = $city;
        $_SESSION['codep'] = $codep;

        return $query;
    }
}