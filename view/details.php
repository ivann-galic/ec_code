<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cod'Flix</title>

    <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/lib/font-awesome/css/all.min.css" rel="stylesheet" />

    <link href="public/css/layout/details.css" rel="stylesheet" />
    <link href="public/css/partials/partials.css" rel="stylesheet" />
    <link href="public/css/layout/layout.css" rel="stylesheet" />
</head>


<body>

    <?php
        $data = $req->fetch()
    ?>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <h2 class="title">Bienvenue</h2>
        <div class="sidebar-menu">
            <ul>
                <li class="active"><a href="index.php?action=mediasList">Médias</a></li>
                <li><a href="#">Nous contacter</a></li>
                <li><a href="index.php?action=logout">Me déconnecter</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <div class="header">
            <h2 class="title">Cod<span>'Flix</span></h2>
            <div class="toggle-menu d-block d-md-none">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fas fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
        </div>
        <div class="content p-4">
            <div class="row">
                <div class="media_infos col-lg-12 col-md-12 col-sm-12 text-center">
                    <iframe style='width:640px; height:368px' allowfullscreen="" frameborder="0"
                            src="<?= $data['trailer_url']; ?>" ></iframe>
                    <h1 class="media_title"><?php echo $data['title'] ?></h1>
                    <p class="media_type"> <?php echo $data['type'] ?></p>
                    <p class="media_status"> <?php echo $data['status'] ?> le <?php echo $data['release_date'] ?></p>
                    <p class="media_summary col-md-10 offset-1 text-justify"> <?php echo $data['summary'] ?></p>
                    <!--<p class="media_type"> <?php /*echo $data['type'] */?></p>-->
                </div>

            </div>
        </div>
        <footer>Copyright Cod'Flix</footer>
    </div>
</div>

<script src="public/lib/jquery/js/jquery-3.5.0.min"></script>
<script src="public/lib/bootstrap/js/bootstrap.min.js"></script>

<script src="public/js/script.js"></script>
</body>

</html>

