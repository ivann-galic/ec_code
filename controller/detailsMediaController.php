<?php

require_once('model/media.php');

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function details() {

    $id = htmlentities($_GET['media']);
    $db = init_db();
    /*    Request to get all the medias informations with the genre and not only the genre's id : */
    $req = $db->query('SELECT * FROM media AS me INNER JOIN genre ge ON me.genre_id = ge.id WHERE me.id = \'' . $id . '\';');

    /*    Request to get all the medias informations with the episodes, seasons and video urls */
    $req_series = $db->query('SELECT * FROM media	AS me INNER JOIN series se ON me.title = se.title WHERE me.id = \'' . $id . '\';');
    $db = null;
    require('view/details.php');
}


