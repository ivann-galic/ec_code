<?php


/***************************
 * ----- LOAD HOME PAGE -----
 ***************************/

function contactPage() {

    $mail = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);
    $name = htmlentities($_POST['name']);
    $last_name = htmlentities($_POST['last_name']);

    $headers = "FROM: ". $mail." (". $name." ". $last_name.")";

    mail('contact@codflix.com', 'Formulaire de contact', $message, $headers);
    require('view/contact.php');
}

