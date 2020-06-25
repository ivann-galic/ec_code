<?php

require_once( 'model/user.php' );

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function profilPage($user_id) {


    $db   = init_db();
    $req = $db->query('SELECT * FROM user WHERE id = \'' . $user_id . '\';');
    $db   = null;
    require('view/profil.php');
}

/***************************
 * ----- CHANGE PASSWORD -----
 ***************************/

function changePassword($id) {

    $current_password = htmlentities($_POST['current_password']);
    $new_password = hash("sha256", htmlentities($_POST['new_password']));

    $db   = init_db();
    $change_pwd = $db->query('UPDATE user SET password = \'' . $new_password . '\' WHERE id = \'' . $id . '\';');
    $db   = null;
}
