<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($Captcha['g-recaptcha-response'])) {
    $secret = 'secret';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
        $_SESSION['Register'] = "on";
    }
    else {
        $message = "Some error in vrifying g-recaptcha";
        echo $message;
    }
}
?>