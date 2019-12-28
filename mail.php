<?php

if($_POST) {
    $firstname = "";
    $lastname = "";
    $email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";

    if(isset($_POST['firstname'])) {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['lastname'])) {
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }


    $recipient = "sl2486@cornell.edu";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";

    $email_title = 'Contact Form';

    if(mail($recipient, $email_title, $message, $headers)) {
        echo "<p>Thank you for contacting me! You will receive a reply as soon as possible.</p>";
    } else {
        echo '<p>Sorry! The email did not go through.</p>';
    }

} else {
    echo '<p>Something went wrong</p>';
}

?>
