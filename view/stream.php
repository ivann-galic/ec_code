<?php ob_start(); ?>

    <?php
        $stream = $req->fetch();
    ?>
    <div class="row">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" allowfullscreen="" frameborder="0"
                    src="<?= $stream['stream_url']; ?>" ></iframe>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>