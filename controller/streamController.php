<?php

require_once( 'model/media.php' );

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function stream() {

    $stream = htmlentities($_GET['stream']);
    $db   = init_db();
    $req = $db->query('SELECT * FROM media WHERE stream_url = \'' . $stream . '\';');
    $db   = null;
    require('view/stream.php');
}


