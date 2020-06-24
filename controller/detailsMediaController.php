<?php

require_once( 'model/media.php' );

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function details() {

    $db   = init_db();
    $req = $db->query('SELECT * FROM media WHERE id = \'' . $_GET['media'] . '\';');
    $db   = null;
    require('view/details.php');
}

