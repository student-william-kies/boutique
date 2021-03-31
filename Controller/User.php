<?php
namespace Controller;
require_once ('Controller.php');
require ('Http.php');

class User extends Controller
{
    /**
     * Méthode qui vas afficher le formulaire d'inscription et inscrire un utilisateur
     */
    public function displayCreatingUser()
    {
        echo ('
        <form action="" method="post">
            <div class="mb-3">
                <span class="form-text">Prénom & Nom *</span>
                <input type="text" name="prenom" aria-label="name" class="form-control" placeholder="Prénom" required>
                <input type="text" name="nom" aria-label="lastname" class="form-control" placeholder="Nom" required>
            </div>
            <div class="mb-3">
                <span class="form-text">Mot de passe *</span>
                <input type="password" name="password" aria-label="password" class="form-control" placeholder="Mot de passe" required>
                <input type="password" name="confirmPassword" aria-label="confirmPassword" class="form-control" placeholder="Confirmation Mot de passe" required>
            </div>
            <div class="mb-3">
                <span class="form-text">E-mail *</span>
                <input type="email" name="email" aria-label="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
                <span class="form-text">Téléphone<i>(Facultatif)</i></span>
                <input type="text" name="phone" aria-label="phone" class="form-control" placeholder="Téléphone">
            </div>
            <div class="mb-3">
                <span class="form-text">Adresse<i>(Facultatif)</i></span>
                <input type="text" name="address" aria-label="address" class="form-control" placeholder="Adresse">
            </div>
            <div class="mb-3">
                <span class="form-text">Ville<i>(Facultatif)</i></span>
                <input type="text" name="city" aria-label="city" class="form-control" placeholder="Ville">
            </div>
            <div class="mb-3">
                <span class="form-text">Code postal<i>(Facultatif)</i></span>
                <input type="number" name="codep" aria-label="codep" class="form-control" placeholder="Code postal">
            </div>

            <input type="submit" name="validCreateUser" aria-label="trueRegister" class="btn btn-secondary" style="margin-bottom: 1%" value="Valider">
        </form>
        ');

        if (isset($_POST['validCreateUser']))
        {
            $this -> creatingUser($_POST['prenom'], $_POST['nom'], $_POST['password'], $_POST['confirmPassword'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['city'], $_POST['codep']);
        }
    }

    /**
     * Permet de gérer et ajouter en base de données un utilisateur
     *
     * @param $prenom
     * @param $nom
     * @param $password
     * @param $confirmPassword
     * @param $email
     * @param $phone
     * @param $address
     * @param $city
     * @param $codep
     */
    public function creatingUser($prenom, $nom, $password, $confirmPassword, $email, $phone, $address, $city, $codep)
    {
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

            if (($lenPrenom >= 3) && ($lenNom >= 3))
            {
                if (($lenPassword >= 5) && ($lenConfirmPassword >= 5))
                {
                    if (($lenEmail >= 20))
                    {
                        if (($lenPrenom <= 13))
                        {
                            if (($lenNom <= 45))
                            {
                                if (($lenPassword <= 30) && ($lenConfirmPassword <= 30))
                                {
                                    if (($lenEmail <= 130))
                                    {
                                        $emailExist = new \Model\User();
                                        $emailExist -> alreadyUsed('utilisateurs', 'email', $email);

                                        if ($emailExist)
                                        {
                                            if ($confirmPassword === $password)
                                            {
                                                if (empty($phone) && empty($address) && empty($city) && empty($codep))
                                                {
                                                    $phone = 0;
                                                    $address = 0;
                                                    $city = 0;
                                                    $codep = 0;
                                                }

                                                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                                                $insertUser = new \Model\User();
                                                $insertUser -> insertUser($prenom, $nom, $hashedPassword, $email, $phone, $address, $city, $codep, $id_droits);

                                                Http::redirect('connexion.php');

                                            } else echo $log = "<p>Erreur: Les mots de passe ne sont pas indentique.</p>";
                                        } else echo $log = "<p>Erreur: L'email est déjà utilisé !</p>";
                                    } else echo $log = "<p>Erreur: Votre information (E-mail) doit avoir 130 caractères maximum.</p>";
                                } else echo $log = "<p>Erreur: Vos information (Mot de passe) doivent avoir 30 caractères maximum.</p>";
                            } else echo $log = "<p>Erreur: Votre information (Nom) doit avoir 45 caractères maximum.</p>";
                        } else echo $log = "<p>Erreur: Votre information (Prenom) doit avoir 13 caractères maximum.</p>";
                    } else echo $log = "<p>Erreur: Votre information (E-mail) doit avoir un minimum de 20 caractères.</p>";
                } else echo $log = "<p>Erreur: Vos informations (Mot de passe) doivent avoir un minimum de 5 caractères.</p>";
            } else echo $log = "<p>Erreur: Vos informations (Prenom, Nom) doivenr avoir un minimum de 3 caractères.</p>";
        } else echo $log = "<p>Erreur: Veuillez remplir le formulaire.</p>";
    }

    /**
     * Affiche le formulaire de connexion d'un utilisateur et le connecte sous des conditions de vérifications
     */
    public function displayConnectingUser()
    {
        echo ('
        <form action="" method="post">
            <div class="mb-3">
                <span class="form-text">E-mail</span>
                <input type="email" name="connectEmail" aria-label="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
                <span class="form-text">Mot de passe</span>
                <input type="password" name="connectPassword" aria-label="password" class="form-control" placeholder="Mot de passe" required>
            </div>
            
            <input type="submit" name="connectUser" value="Connexion" class="btn btn-secondary" style="margin-bottom: 1%">
        </form>
        ');

        if (isset($_POST['connectUser']))
        {
            $this -> connectingUser($_POST['connectEmail'], $_POST['connectPassword']);
        }
    }

    /**
     * Permet de gérer et connecter un utilisateur
     *
     * @param $email
     * @param $password
     */
    public function connectingUser($email, $password)
    {
        $this -> secure($email);
        $this -> secure($password);

        if (!empty($email) && !empty($password))
        {
            session_start();

            $connect = new \Model\User();
            $connect -> connect($email, $password);

        } else echo $log = "<p>Erreur: Veuillez remplir le formulaire.</p>";
    }

    public function displayIdentity()
    {
        echo ('
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="updatePrenom" class="col-sm-2 form-text">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="updatePrenom" name="updatePrenom" value="' . $_SESSION['utilisateur']['prenom'] . '">
                </div>
            </div>
    
            <div class="mb-3 row">
                <label for="updateNom" class="col-sm-2 form-text">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="updateNom" name="updateNom" value="' . $_SESSION['utilisateur']['nom'] . '">
                </div>
            </div>
    
            <div class="mb-3 row">
                <label for="updateEmail" class="col-sm-2 form-text">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="updateEmail" name="updateEmail" value="' . $_SESSION['utilisateur']['email'] . '">
                </div>
            </div>
    
            <div class="mb-3 row">
                <label for="updatePassword" class="col-sm-2 form-text">New MDP</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="updatePassword" name="updatePassword" placeholder="Nouveau Mot de passe">
                </div>
            </div>
    
            <div class="mb-3 row">
                <label for="confirmUpdatePassword" class="col-sm-2 form-text">Confirm New MDP</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmUpdatePassword" name="confirmUpdatePassword" placeholder="Confirmer Nouveau Mot de passe">
                </div>
            </div>

            <input type="submit" id="update" name="update" value="Mettre à jour" class="btn btn-secondary">
        </form>
    ');

        if (isset($_POST['update']))
        {
            $this -> updatingUser($_POST['updatePrenom'], $_POST['updateNom'], $_POST['updateEmail'], $_POST['updatePassword'], $_POST['confirmUpdatePassword']);
        }
    }

    public function updatingUser($prenom, $nom, $email, $password, $confirmPassword)
    {
        $this -> secure($prenom);
        $this -> secure($nom);
        $this -> secure($email);
        $this -> secure($password);
        $this -> secure($confirmPassword);

        $sameValue = new \Model\User();
        $updateValue = new \Model\User();

        $getPrenom = $sameValue -> sameValue('prenom');
        if ($prenom != $getPrenom)
        {
            $updateValue -> updateValue('utilisateurs', 'prenom', $prenom);
            $_SESSION['utilisateur']['prenom'] = $prenom;

            Http::redirect('identity.php');
        }
        else
        {
            $updateValue -> updateValue('utilisateurs', 'prenom', $_SESSION['utilisateur']['prenom']);
            Http::redirect('identity.php');
        }

        $getNom = $sameValue -> sameValue('nom');
        if ($nom != $getNom)
        {
            $updateValue -> updateValue('utilisateurs', 'nom', $nom);
            $_SESSION['utilisateur']['nom'] = $nom;

            Http::redirect('identity.php');
        }
        else
        {
            $updateValue -> updateValue('utilisateurs', 'nom', $_SESSION['utilisateur']['nom']);
            Http::redirect('identity.php');
        }

        $getEmail = $sameValue -> sameValue('email');
        if ($email != $getEmail)
        {
            $updateValue -> updateValue('utilisateurs', 'email', $email);
            $_SESSION['utilisateur']['email'] = $email;

            Http::redirect('identity.php');
        }
        else
        {
            $updateValue -> updateValue('utilisateurs', 'email', $_SESSION['utilisateur']['email']);
            Http::redirect('identity.php');
        }

        $getPassword = $sameValue -> sameValue('password');
        if ($password != $getPassword)
        {
            if ($password === $confirmPassword)
            {
                $updateHashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $updateValue -> updateValue('utilisateurs', 'password', $updateHashedPassword);
                $_SESSION['utilisateur']['password'] = $updateHashedPassword;

                Http::redirect('identity.php');
            } else echo $log = "<p>Erreur: Les mots de passe ne sont pas identiques.</p>";
        }
        else
        {
            $updateValue -> updateValue('utilisateurs', 'password', $_SESSION['utilisateur']['password']);
            Http::redirect('identity.php');
        }
    }

    public function displayAddress()
    {
        echo ('
        <form action="" method="post">
            <div class="mb-3 row">
                <label for="phone" class="col-sm-2 form-text">Téléphone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="phone" value="' . $_SESSION['utilisateur']['telephone'] . '">
                </div>
            </div>
    
            <div class="mb-3 row">
                <label for="address" class="col-sm-2 form-text">Adresse</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" name="address" value="' . $_SESSION['utilisateur']['adresse'] . '">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="city" class="col-sm-2 form-text">Ville</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city" value="' . $_SESSION['utilisateur']['ville'] . '">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="codep" class="col-sm-2 form-text">Code Postal</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="codep" name="codep" value="' . $_SESSION['utilisateur']['codep'] . '">
                </div>
            </div>

            <input type="submit" id="insertAddress" name="insertAddress" value="Enregistrer" class="btn btn-secondary">
        </form>
    ');

        if (isset($_POST['insertAddress']))
        {
            $this -> creatingAddress($_POST['phone'], $_POST['address'], $_POST['city'], $_POST['codep']);
        }
    }

    public function creatingAddress($phone, $address, $city, $codep)
    {
        if (isset($_SESSION['utilisateur']['id']) && isset($_POST['insertAddress']))
        {
            $this -> secure($phone);
            $this -> secure($address);
            $this -> secure($city);
            $this -> secure($codep);

            if (!empty($phone) && !empty($address) && !empty($city) && !empty($codep))
            {


                $createAddress = new \Model\User();
                $createAddress -> updateAddress($phone, $address, $city, $codep);

                echo $log = "<p>Modifications enregistrées.</p>";
            }
            else
            {
                $emptyValue = new \Model\User();
                $emptyValue -> updateAddress($_SESSION['utilisateur']['telephone'], $_SESSION['utilisateur']['adresse'], $_SESSION['utilisateur']['ville'], $_SESSION['utilisateur']['codep']);

                echo $log = "<p>Modifications enregistrées.</p>";
            }
        }
    }

    public function deletingUser($id)
    {
        $deleteUser = new \Model\User();
        $deleteUser -> deleteManageUser($id);

        Http::redirect('admin.php');
    }
}