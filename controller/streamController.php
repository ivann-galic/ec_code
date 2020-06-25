<?php

require_once( 'model/media.php' );

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function details() {

    $id = htmlentities($_GET['media']);
    $db   = init_db();

    $db   = null;
    require('view/stream.php');
}


