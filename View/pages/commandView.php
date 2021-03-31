<?php
require ('../../Controller/User.php');
require ('../../Model/User.php');
require ('../../Model/Product.php');
require ('../../Model/Ordered.php');
use Controller\Http;

session_start();

if (isset($_POST['logout'])){

    session_destroy();
    Http::redirect('connexion.php');
    exit();
}

?>

<?php $css = "css/commandView.css"; ?>

<?php ob_start(); ?>

<section class="container history__section">
    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Numéro de commande</th>
                <th scope="col">Total de la commande</th>
            </tr>
        </thead>
        <section class="container profil__links">
            <a href="profil.php" class="btn btn-primary">Retour a votre compte</a>
            <a href="home.php" class="btn btn-primary">Accueil</a>
        </section>
        <?php
        $displayOrder = new \Model\Ordered();
        $allOrder = $displayOrder -> displayOrder($_SESSION['utilisateur']['id']);

        if ($allOrder != false)
        {
            foreach ($allOrder as $order)
            {
                echo ('
                <tbody>
                    <form action="" method="get" xmlns="http://www.w3.org/1999/html">
                       <tr>
                           <td style="text-align: center;">#' . $order['id_commande'] . '</td>
                           <td style="padding-left: 0.2%; text-align: center;">' . $order['prix'] . '€</td>
                           <td style="padding-left: 0.2%; text-align: center;"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-eye"></i></button></td>
                       </tr>
                   </form>
                </tbody>
               <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">commande numéro #' . $order['id_commande'] . '</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <strong>Votre commande à bien été pris en compte. Veuillez trouver ci-dessous toutes les informations de commande.</strong>
                                <hr>
                                <p><strong>ID Commande : #</strong>' . $order['id_commande'] . '</p>
                                <p><strong>Prénom :</strong> ' . $order['prenom'] . '</p>
                                <p><strong>Nom :</strong> ' . $order['nom'] . '</p>
                                <p><strong>Email :</strong> ' . $order['email'] . '</p>
                                <p><strong>Tel :</strong> ' . $order['telephone'] . '</p>
                                <p><strong>Adresse</strong> : ' . $order['adresse'] . '</p>
                                <p><strong>Ville</strong> : ' . $order['ville'] . '</p>
                                <p><strong>Code Postal</strong> : ' . $order['codep'] . '</p>
                                <p><strong>Titre Produit</strong> : ' . $order['titre'] . '</p>
                                <p><strong>Son Prix :</strong> ' . $order['prix'] . '€</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
               ');
            }
        }
        else
        {
            echo $log = '<div class="alert alert-warning text-center" role="alert">Vous n\'avez toujours pas commander ?<a href="#" class="alert-link">Commander ici</a>, faites vite !</div>';
        }
        ?>
    </table>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>