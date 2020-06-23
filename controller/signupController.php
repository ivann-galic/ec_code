<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
 * ----- SIGNUP FUNCTION -----
 **************************/

function signUp( $post ) {

/*    $data           = new stdClass();
    $data->email    = $post['email'];
    $data->password = $post['password'];
    $data->password_confirm = $post['password_confirm'];*/

    $user = new User();
    try {
        $user->setEmail($post['email']);
    } catch (Exception $e) {
        $error_msg = 'L\'email renseigné est incorrect';
    }
    try {
        $user->setPassword($post['password'], $post['password_confirm']);
    } catch (Exception $e) {
        $error_msg = 'Vos mots de passes sont différents';
    }
    try {
        $user->createUser();
    } catch (Exception $e) {
        $error_msg = 'Ce mail est déjà enregistré.';
    }

    require('view/auth/signupView.php');

}