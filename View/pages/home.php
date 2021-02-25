<?php

?>

<?php $css = ""; ?>

<?php ob_start(); ?>

<!-- Empty section for the pictures -->
<section class="container-fluid main__section"></section>

<section class="container-fluid main__section">
    <p>test</p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
