<?php ob_start(); ?>

<div id="home">
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">Cod<span>'Flix</span></h1>
                    <p>
                        <strong>Bienvenue</strong>
                    </p>
                </div>
            </div>
            <div class="row btn-container">
                <div class="col-md-4"><a href="index.php?action=login" class="btn btn-block bg-danger">Connexion</a></div>
                <div class="col-md-4"><a href="index.php?action=signup" class="btn btn-block bg-info">Inscription</a></div>
                <div class="col-md-4"><a href="index.php?action=contact" class="btn btn-block bg-success">Nous contacter</a></div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('base.php'); ?>
