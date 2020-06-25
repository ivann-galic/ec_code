<?php

require_once('model/user.php');

/****************************
 * ----- LOAD SIGNUP PAGE -----
 ****************************/

function signupPage()
{

    $user = new stdClass();
    $user->id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if (!$user->id):
        require('view/auth/signupView.php');
    else:
        require('view/homeView.php');
    endif;

}

/***************************
 * ----- SIGNUP FUNCTION -----
 **************************/

function signUp($post)
{

    $user = new User();

    try {
        $user->setEmail($post['email']);
    } catch (Exception $e) {
        $error_msg = 'L\'email renseigné est incorrect';
    }

    /*    Verifies if the two passwords are equals */
    try {
        $user->setPassword($post['password'], $post['password_confirm']);
    } catch (Exception $e) {
        $error_msg = 'Vos mots de passes sont différents';
    }

    /*    Generates a random key to confirm user account later */
    $active = 0;
    $user->setActive($active);

    $key_size = 20;
    $key = "";
    for ($i = 1; $i < $key_size; $i++) {
        $key .= mt_rand(0, 9);
    }
    $user->setConfirmkey($key);

    try {
        $user->createUser();
    } catch (Exception $e) {
        /*    Verifies if the email is already present in the database */
        $error_msg = 'Ce mail est déjà enregistré.';
    }

    require('view/auth/signupView.php');

}