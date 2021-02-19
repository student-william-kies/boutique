<?php
require_once ('../../autoload.php');
?>

<?php $css = ""; ?>

<?php ob_start(); ?>

<section class="container-fluid">

</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
