<?php

require_once('model/media.php');

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function mediaPage() {

    /*    If a title is entered on the search bar, the filter is applied */
    $search = isset($_GET['title']) ? $_GET['title'] : null;
    if ($search == null || isset($_GET['all'])) {
        $medias = Media::displayAllMedias($search);
    } else {
        $medias = Media::filterMedias($search);
    }

    if(isset($_GET['genre'])) {
        $medias = Media::filterGenre($_GET['genre']);
    }
    if(isset($_GET['type'])) {
        $medias = Media::filterType($_GET['type']);
    }

    require('view/mediaListView.php');

}
