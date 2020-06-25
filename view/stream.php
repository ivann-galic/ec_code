<?php ob_start(); ?>

    <?php
    /* Gets the video url send by the page url to update the player : */
        $url= ($_GET['stream']);
    ?>
    <div class="row">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" allowfullscreen="" frameborder="0"
                    src="<?= $url ?>" ></iframe>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>