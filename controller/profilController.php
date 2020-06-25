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

    $current_password = hash("sha256", htmlentities($_POST['current_password']));
    $new_password = hash("sha256", htmlentities($_POST['new_password']));
    $db = init_db();
    $verify_pwd = $db->query('SELECT * FROM user WHERE id = \'' . $id . '\';');
    $user = $verify_pwd->fetch();
    if ($user['password'] == $current_password) {
        echo'<div class="alert alert-success alert_profil_password" role="alert">Votre mot de passe a bien été enregistré.</div>';
            $change_pwd = $db->query('UPDATE user SET password = \'' . $new_password . '\' WHERE id = \'' . $id . '\';');
    } else {
            echo'<div class="alert alert-danger alert_profil_password" role="alert">Votre mot de passe actuel n\'est pas correct.</div>';
    }

    $db   = null;
}
