<?php

require_once('controller/homeController.php');
require_once('controller/loginController.php');
require_once('controller/signupController.php');
require_once('controller/mediaController.php');
require_once('controller/detailsMediaController.php');

/**************************
 * ----- HANDLE ACTION -----
 ***************************/

if (isset($_GET['action'])):

    switch ($_GET['action']):

        case 'login':

            if (!empty($_POST)) login($_POST);
            else loginPage();

            break;

        case 'signup':

            if (!empty($_POST)) signUp($_POST);
            else signupPage();

            break;

        case 'mediasList':
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
            if ($user_id):
                mediaPage();
            else:
                homePage();
            endif;

            break;


        case 'logout':

            logout();

            break;

    endswitch;

else:

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if ($user_id):

        if ($_GET['media']) {
            details();
        } else {
            mediaPage();
        }

    else:
        homePage();
    endif;

endif;
