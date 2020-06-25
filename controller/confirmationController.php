<?php


/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function confirmationPage() {

    if(isset($_GET['mail'], $_GET['key']) AND !empty($_GET['mail']) AND !empty($_GET['key'])) {

        /*    Variable to displays messages on the confirmation page */
        $info = "";

        /* Gets the informations send by the url : */
        $mail = htmlspecialchars(urldecode($_GET['mail']));
        $key = htmlspecialchars($_GET['key']);

        $db   = init_db();
        $req_user = $db->prepare('SELECT * FROM user WHERE email = ? AND confirm_key = ?;');
        $req_user->execute(array($mail, $key));

        /* Verifies if the user exists: */
        $user_exist = $req_user->rowCount();

        if($user_exist == 1) {
            $user = $req_user->fetch();
            if($user['active'] == 0) {
                /* If the user is not already activated, modifies the database to active the account : */
                $update_user = $db->prepare('UPDATE user SET active = 1 WHERE email = ? AND confirm_key = ?;');
                $update_user->execute(array($mail, $key));
                $info = "Votre compte a bien été confirmé !";
            } else {
                $info = "Votre compte est déjà activé.";
            }
        } else {
            $info = "L'utilisateur n'existe pas.";
        }
        $db   = null;
        }

    require('view/confirmation.php');
}
