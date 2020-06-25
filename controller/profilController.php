<?php

require_once('model/user.php');

/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function profilPage($user_id)
{

    /*    Calls the database to get all the user's informations */
    $db = init_db();
    $req = $db->query('SELECT * FROM user WHERE id = \'' . $user_id . '\';');
    $db = null;
    require('view/profil.php');
}

/***************************
 * ----- CHANGE PASSWORD -----
 ***************************/

function changePassword($id)
{

    $current_password = hash("sha256", htmlentities($_POST['current_password']));
    $new_password = hash("sha256", htmlentities($_POST['new_password']));
    $db_password = init_db();

    /*    Verifies is the password entered is good */
    $verify_pwd = $db_password->query('SELECT * FROM user WHERE id = \'' . $id . '\';');
    $user = $verify_pwd->fetch();
    if ($user['password'] == $current_password) {
        echo '<div class="alert alert-success alert_profil_password" role="alert">Votre mot de passe a bien été enregistré.</div>';
        $change_pwd = $db_password->query('UPDATE user SET password = \'' . $new_password . '\' WHERE id = \'' . $id . '\';');
    } else {
        echo '<div class="alert alert-danger alert_profil_password" role="alert">Votre mot de passe actuel n\'est pas correct.</div>';
    }

    $db_password = null;
}

/***************************
 * ----- CHANGE EMAIL -----
 ***************************/

function changeEmail($id)
{

    $new_mail = htmlentities($_POST['new_email']);
    $db_email = init_db();

    /*    Verifies is the email entered is not already used by an other user */
    $verify_mail = $db_email->prepare('SELECT email FROM user WHERE email = ?');
    $verify_mail->execute(array($new_mail));
    $user = $verify_mail->fetchAll();
    if ($user) {
        echo '<div class="alert alert-danger" role="alert">Cette adresse email est déjà utilisée.</div>';
    } else {
        echo '<div class="alert alert-success" role="alert">Votre adresse email a bien été modifiée.</div>';
        $change_email = $db_email->query('UPDATE user SET email = \'' . $new_mail . '\' WHERE id = \'' . $id . '\';');
    }

    $db_email = null;
}

/***************************
 * ----- DELETE ACCOUNT -----
 ***************************/

function deleteAccount($id)
{

    $current_password = hash("sha256", htmlentities($_POST['delete_account_password']));
    $db_delete_account = init_db();

    /*    Verifies is the password entered is good */
    $verify_pwd = $db_delete_account->query('SELECT * FROM user WHERE id = \'' . $id . '\';');
    $user = $verify_pwd->fetch();
    if ($user['password'] == $current_password) {
        echo '<div class="alert alert-success alert_profil_password" role="alert">Votre compte a été supprimé.</div>';
        $delete = $db_delete_account->query('DELETE FROM user WHERE id = \'' . $id . '\';');
    } else {
        echo '<div class="alert alert-danger alert_profil_password" role="alert">Votre mot de passe n\'est pas correct.</div>';
    }

    $db_email = null;
}
