<?php ob_start(); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
<!--        Displays the informations about the account confirmation :-->
        <p><?= isset( $info ) ? $info : null; ?></p>
        <a href="index.php?action=login"><button type="button" class="btn btn-outline-primary">Se connecter</button></a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>

