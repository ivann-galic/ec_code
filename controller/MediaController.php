<?php

require_once('model/media.php');

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function mediaPage() {

    /*    If a title is entered on the search bar, the filter is applied */
    $search = isset($_GET['title']) ? $_GET['title'] : null;
    if ($search == null) {
        $medias = Media::displayAllMedias($search);
    } else {
        $medias = Media::filterMedias($search);
    }

    require('view/mediaListView.php');

}
