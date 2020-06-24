<?php ob_start(); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
        <p><?= isset( $info ) ? $info : null; ?></p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>

