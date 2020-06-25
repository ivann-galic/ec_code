<?php ob_start(); ?>

            <?php
                $data = $req->fetch();
                $data_Series = $req_series->fetchAll();
            ?>
            <div class="row body_current">
                <div class="media_infos col-lg-12 col-md-12 col-sm-12 text-center">
                    <iframe style='width:640px; height:368px' allowfullscreen="" frameborder="0"
                            src="<?= $data['trailer_url']; ?>" ></iframe>
                    <h1 class="media_title"><?php echo $data['title'] ?></h1>
                    <p class="media_type"><?php echo $data['type'] ?> / <?php echo $data['name'] ?></p>
                    <p class="media_status"> <?php echo $data['status'] ?> le <?php echo $data['release_date'] ?></p>
                    <p class="media_summary col-md-10 offset-1 text-justify"> <?php echo $data['summary'] ?></p>
                    <?php
                    if($data['type'] == "Film") {
                        echo '<a class="stream_link text-danger" style="text-decoration: none;" href="index.php?stream='.$data['stream_url'].'"><h2>Visionner le film</h2></a>';
                    } elseif($data['type'] == "Série") {
                        echo '<h2>Episodes disponibles :</h2>';
                        foreach( $data_Series as $series ):?>
                            <a class="stream_link text-danger" style="text-decoration: none;" href="index.php?stream=<?php echo $series['episode_url'] ?>">
                    <p>Saison <?php echo $series['season'] ?> / Episode <?php echo $series['episode'] ?></p>
                    </a>
                            <?php endforeach;
                    }
                    ?>
                </div>
            </div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>

