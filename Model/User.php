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
     * Permet de recupérer une données précise en base de données
     *
     * @param $column
     * @return mixed
     */
    public function sameValue($column)
    {
        $query = $this -> pdo -> prepare("SELECT " . $column . " FROM utilisateurs WHERE id = :id");
        $query -> execute([
            "id" => $_SESSION['utilisateur']['id']
        ]);
        $tab = $query -> fetch();

        return $tab[$column];
    }

    /**
     * Permet de modifier les infos utilisateurs
     *
     * @param $table
     * @param $column
     * @param $var
     * @return false|PDOStatement
     */
    public function updateValue($table, $column, $var)
    {
        $query = $this -> pdo -> prepare("UPDATE " . $table . " SET " . $column . " = :var WHERE id = :id");
        $query -> execute([
            "var" => $var,
            "id" => $_SESSION['utilisateur']['id']
        ]);

        $_SESSION["utilisateur"][$column] = $var;

        return $query;
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

                $_SESSION['utilisateur'] = $infoUser;

                Http::redirect('home.php');

            } else echo $log = "<p>Erreur: Mot de passe incorrect.</p>";
        } else echo $log = "<p>Erreur: Utilisateur introuvable.</p>";
    }

    /**
     * Permet de modifier les informations sur l'adresse
     *
     * @param $phone
     * @param $address
     * @param $city
     * @param $codep
     * @return false|PDOStatement
     */
    public function updateAddress($phone, $address, $city, $codep)
    {
        $query = $this -> pdo -> prepare("UPDATE utilisateurs SET telephone = :phone, adresse = :adresse, ville = :ville, codep = :codep WHERE id = :id");
        $query -> execute([
            "phone" => $phone,
            "adresse" => $address,
            "ville" => $city,
            "codep" => $codep,
            "id" => $_SESSION['utilisateur']['id']
        ]);

        $_SESSION['utilisateur']['telephone'] = $phone;
        $_SESSION['utilisateur']['adresse'] = $address;
        $_SESSION['utilisateur']['ville'] = $city;
        $_SESSION['utilisateur']['codep'] = $codep;

        return $query;
    }

    /**
     * Affiche tout les utilisateurs présent en base de données
     *
     * @return array
     */
    public function displayManageUser()  
    {
        $query = $this -> pdo -> prepare("SELECT * FROM utilisateurs");
        $query -> execute();

        return $query -> fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteManageUser($id)
    {
        $query = $this -> pdo -> prepare("DELETE FROM utilisateurs WHERE id = :id");
        $query -> execute([
            "id" => $id
        ]);
    }
}