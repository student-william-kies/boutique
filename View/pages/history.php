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

<?php $css = "css/history.css"; ?>

<?php ob_start(); ?>

<section class="container history__section">
    <?php
    $displayOrder = new \Model\Ordered();
    $allOrder = $displayOrder -> displayOrder($_SESSION['utilisateur']['id']);

    foreach ($allOrder as $order)
    {
        echo ('<form action="" method="get">
                   <tr>
                       <td style="text-align: center;">' . $order['prenom'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['nom'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['email'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['telephone'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['adresse'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['ville'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['codep'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['titre'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['prix'] . '</td>
                       <td style="padding-left: 0.2%; text-align: center;">' . $order['id_user'] . '</td>
                   </tr>
               </form>');
    }
    ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
