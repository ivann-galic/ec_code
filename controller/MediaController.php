<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {

    $search = isset($_GET['title']) ? $_GET['title'] : null;
    if($search == null){
        $medias = Media::displayAllMedias($search);
    }else{
        $medias = Media::filterMedias($search);
    }

    require('view/mediaListView.php');

}
