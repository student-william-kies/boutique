<?php
namespace Controller;
require_once ('Controller.php');

class User extends Controller
{
    /**
     * Méthode qui vas afficher le formulaire d'inscription
     */
    public function displayCreatingUser()
    {
        /*
         * Affichage du formulaire d'inscription
         */
        echo ('
        <form action="" method="post">
            <div class="input-group">
                <span class="input-group-text">Prénom & Nom *</span>
                <input type="text" name="prenom" aria-label="name" class="form-control" placeholder="Prénom" required>
                <input type="text" name="nom" aria-label="lastname" class="form-control" placeholder="Nom" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Mot de passe *</span>
                <input type="password" name="password" aria-label="password" class="form-control" placeholder="Mot de passe" required>
                <input type="password" name="confirmPassword" aria-label="confirmPassword" class="form-control" placeholder="Confirmation Mot de passe" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">E-mail *</span>
                <input type="email" name="email" aria-label="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="input-group">
                <span class="input-group-text">Téléphone<i>(Facultatif)</i></span>
                <input type="text" name="phone" aria-label="phone" class="form-control" placeholder="Téléphone">
            </div>
            <div class="input-group">
                <span class="input-group-text">Adresse<i>(Facultatif)</i></span>
                <input type="text" name="address" aria-label="address" class="form-control" placeholder="Adresse">
            </div>
            <div class="input-group">
                <span class="input-group-text">Ville<i>(Facultatif)</i></span>
                <input type="text" name="city" aria-label="city" class="form-control" placeholder="Ville">
            </div>
            <div class="input-group">
                <span class="input-group-text">Code postal<i>(Facultatif)</i></span>
                <input type="number" name="codep" aria-label="codep" class="form-control" placeholder="Code postal">
            </div>

            <input type="submit" name="validCreateUser" aria-label="trueRegister" class="form" value="Valider">
        </form>
        ');

        if (isset($_POST['validCreateUser']))
        {
            $this -> manageUser($_POST['prenom'], $_POST['nom'], $_POST['password'], $_POST['confirmPassword'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['city'], $_POST['codep']);
        }
    }

    public function manageUser($prenom, $nom, $password, $confirmPassword, $email, $phone, $address, $city, $codep)
    {
        /*
         * Sécurisation des données
         */
        $this -> secure($prenom);
        $this -> secure($nom);
        $this -> secure($password);
        $this -> secure($confirmPassword);
        $this -> secure($email);
        $this -> secure($phone);
        $this -> secure($address);
        $this -> secure($city);
        $this -> secure($codep);
        $id_droits = 1;

        if (!empty($prenom) && !empty($nom) && !empty($password) && !empty($confirmPassword) && !empty($email))
        {
            $lenPrenom = strlen($prenom);
            $lenNom = strlen($nom);
            $lenPassword = strlen($password);
            $lenConfirmPassword = strlen($confirmPassword);
            $lenEmail = strlen($email);

            /*
             * Limite minimum de caractères (Normalement un mot de passe standard doit être composé d'un minimum de 12 caractères :) )
             */
            if (($lenPassword >= 5) && ($lenConfirmPassword >= 5) && ($lenEmail >= 20))
            {
                if (($lenPrenom <= 13) && ($lenNom <= 45) && ($lenPassword <= 30) && ($lenConfirmPassword <= 30) && ($lenEmail <= 130))
                {
                    $emailExist = new \Model\User();
                    $emailExist -> alreadyUsed('utilisateurs', 'email', $email); // Vérification si l'email existe ou pas

                    if (!$email)
                    {
                        if ($confirmPassword === $password)
                        {
                            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                            $insertUser = new \Model\User();
                            $insertUser -> insert($prenom, $nom, $hashedPassword, $email, $phone, $address, $city, $codep, $id_droits);

                            echo ('Bien joué ! Compte créer');
                            /* Si tout marche ici, on redirige vers la page de connexion */
                        }
                        else
                        {
                            $error = "<p>Erreur: Les mots de passe ne sont pas indentiques, veuillez réessayer.</p>";
                        }
                    }
                    else
                   {
                       $error = "<p>Erreur: Cet adresse e-mail existe déjà !</p>";
                   }
                }
                else
                {
                    $error = "<p>Erreur: Vos informations ne doivent pas dépassées un certains nombres de caractères.</p>";
                }
            }
            else
            {
                $error = "<p>Erreur: Vos informations doivent avoir un minimum de caractères.</p>";
            }
        }
        else
        {
            $error = "<p>Erreur: Veuillez remplir le formulaire.</p>";
        }

        echo $error = "";
    }
}