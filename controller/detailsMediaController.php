<?php

require_once( 'model/media.php' );

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function details() {

    $id = htmlentities($_GET['media']);
    $db   = init_db();
    $req = $db->query('SELECT * FROM media AS me INNER JOIN genre ge On me.genre_id = ge.id WHERE me.id = \'' . $id . '\';');
    $db   = null;
    require('view/details.php');
}

