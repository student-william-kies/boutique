<?php
require ('../../Controller/User.php');
require ('../../Model/User.php');

?>

<?php $css = "css/inscription.css"; ?>

<?php ob_start(); ?>

<section class="container-fluid">
    <section class="container register">
        <?php
        $displayCreatingUser = new Controller\User();
        $displayCreatingUser -> displayCreatingUser();
        ?>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
