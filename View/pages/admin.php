<?php
require ('../../Controller/User.php');
require ('../../Model/User.php');
use Controller\Http;

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

?>

<?php $css = "css/admin.css"; ?>

<?php ob_start(); ?>

    <h2 id="text__admin">Administration</h2>
    <section class="container admin__section">
        <section class="container-fluid admin-content">
            <section class="d-flex align-items-start">
                <section class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Gestion Produits</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Gestion Catégories</a>
                    <a class="nav-link" id="v-pills-users-tab" data-bs-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">Gestion Utilisateurs</a>
                </section>
                <section class="tab-content" id="v-pills-tabContent">
                    <!-- GESTION DES PRODUITS -->
                    <section class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-articles-tab">
                        <table>
                            <thead>
                            <th>id_produits</th>
                            <th>id_cat</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Quantite_stock</th>
                            <th>Stock_status</th>
                            <th>Photo1</th>
                            <th>Photo2</th>
                            <th>Photo3</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </section>
                    <!-- GESTION DES CATEGORIES -->
                    <section class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-categories-tab">
                        <table>
                            <thead>
                            <th>
                            <th>id_categorie</th>
                            <th>Nom</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </section>
                    <!-- GESTION DES UTILISATEURS -->
                    <section class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                        <table>
                            <thead>
                            <th>id</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>CodeP</th>
                            <th>id_droits</th>
                            </thead>
                            <tbody>
                            <?php
                            $userManager = new \Model\User();
                            $users = $userManager -> displayManageUser();

                            foreach ($users as $allUsers)
                            {
                                echo ('<form action="" class="user_table" method="get">
                                           <tr>
                                               <td style="text-align: center">' . $allUsers['id'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['prenom'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['nom'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['email'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['telephone'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['adresse'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['ville'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['codep'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allUsers['id_droits'] . '</td>
                                               <td style="border: none" class="d-flex flex-row justify-center">                                                         
                                                   <input type="submit" class="btn btn-danger input-User" id="delete_User" name="deleteUser" onclick="return confirm(\'Etes vous sûre de vouloir supprimer le compte selectionné ?\');" value="-">
                                                   <input type="hidden" id="hiddenDeleteUser" name="hiddenDeleteUser" value="' . $allUsers['id'] . '">
                                               </td>
                                           </tr>
                                           </form>');
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_GET['deleteUser']))
                        {
                            $delete = new \Controller\User();
                            $delete -> deletingUser($_GET['hiddenDeleteUser']);
                        }
                        ?>
                    </section>
                </section>
            </section>
        </section>
    </section>

    <section class="container">
        <a href="profil.php">Retour a votre compte</a>
        <a href="home.php">Accueil</a>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
