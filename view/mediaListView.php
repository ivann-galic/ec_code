<?php ob_start(); ?>

<div class="row">
    <div class="col-md-4 offset-md-8">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12 media-list">
        <?php foreach( $medias as $media ): /* Displays all the episodes of the serie */?>
            <a class="item" href="index.php?media=<?= $media['id']; ?>">
                <div class="video">
                    <div>
                        <iframe style='width:476px; height:268px' allowfullscreen="" frameborder="0"
                                src="<?= $media['trailer_url']; ?>" ></iframe>
                    </div>
                </div>
                <div class="title">
                    <p class="title_list"><?= $media['title']; ?></p>
                    <p class="release_date_list"><?= $media['release_date']; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
<?php //require('../controller/MediaController.php'); ?>
