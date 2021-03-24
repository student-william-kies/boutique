<?php
require ('../../Controller/User.php');
require ('../../Model/User.php');

?>

<?php $css = "css/connexion.css"; ?>

<?php ob_start(); ?>

    <section class="container-fluid">
        <section class="container login">
            <?php
            $displayConnectingUser = new \Controller\User();
            $displayConnectingUser -> displayConnectingUser();
            ?>
        </section>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>