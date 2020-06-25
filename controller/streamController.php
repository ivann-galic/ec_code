<?php

require_once( 'model/media.php' );

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function stream() {

    $stream = htmlentities($_GET['stream']);
    $db   = init_db();
/*    Calls the database to get informations about the media which has the good stream url*/
    $req = $db->query('SELECT * FROM media WHERE stream_url = \'' . $stream . '\';');
    $db   = null;
    require('view/stream.php');
}


