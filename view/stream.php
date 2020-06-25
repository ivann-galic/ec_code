<?php ob_start(); ?>


    <div class="row">
        <div class="media_infos col-lg-12 col-md-12 col-sm-12 text-center">

        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>