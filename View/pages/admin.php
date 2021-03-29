<?php
require ('../../Controller/User.php');
require ('../../Model/User.php');
require ('../../Model/Product.php');
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
                        <section class="table-responsive">
                            <table class="table table-hover caption-top">
                                <caption>
                                    <a href="addProduct.php" class="form-control" style="text-decoration: none; text-align: center">Ajouter produits</a>
                                </caption>
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">Icone</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prix</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $productManager = new \Model\Product();
                                $products = $productManager -> displayManageProduct();

                                foreach ($products as $allProducts)
                                {
                                    echo ('<form action="" class="user_table" method="get">
                                           <tr>
                                               <td style="text-align: center; width: 10%;"><img src=' . $allProducts['photo1']  . ' style="width: 30%"></td>
                                               <td style="text-align: center;">' . $allProducts['titre'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allProducts['description'] . '</td>
                                               <td style="padding-left: 0.2%; text-align: center;">' . $allProducts['prix'] . ' €</td>
                                               <td style="border: none" class="d-flex flex-row justify-center">                                                         
                                                   <a href="modifyProducts.php?id_produits=' . $allProducts['id_produits'] . '" type="submit" class="btn btn-primary" id="modify_Product"><i class="fas fa-pencil-alt"></i></a>
                                                   <input type="hidden" id="hiddenModifyProduct" name="hiddenModifyProduct" value="' . $allProducts['id_produits'] . '">
                                               </td>
                                           </tr>
                                           </form>');
                                }
                                ?>
                                </tbody>
                            </table>
                        </section>
                    </section>
                    <!-- GESTION DES CATEGORIES -->
                    <section class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-categories-tab">
                        <section class="table-responsive">
                            <table class="table table-hover caption-top">
                                <caption>Liste Catégories</caption>
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">id_categorie</th>
                                    <th scope="col">Nom</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </section>
                    </section>
                    <!-- GESTION DES UTILISATEURS -->
                    <section class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                        <section class="table-responsive">
                            <table class="table table-hover caption-top">
                                <caption>Liste Utilisateurs</caption>
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">CodeP</th>
                                    <th scope="col">id_droits</th>
                                </tr>
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
                        </section>
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
