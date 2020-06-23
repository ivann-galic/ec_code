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
 **************************
 * @throws Exception
 */

function signUp( $post ) {

    $data           = new stdClass();
    $data->email    = $post['email'];
    $data->password = $post['password'];
    $data->password_confirm = $post['password_confirm'];

    $user = new User( $data );
    $user->createUser();

    require('view/auth/signupView.php');

}