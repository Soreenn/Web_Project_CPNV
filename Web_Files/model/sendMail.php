<?php

function emailSending($infoMail){

    require_once "PHPMailer/PHPMailerAutoload.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = "mail01.swisscenter.com";
    $mail->SMTPAuth = true;
    $mail->Username = "no-reply@alibis.mycpnv.ch";
    $mail->Password = "secret";
    $mail->Port = "587";
    $mail->SMTPSecure = "tls";

    $mail->From = "no-reply@alibis.mycpnv.ch";
    $mail->FromName= "Alibis - No Reply";
    $mail->addAddress($infoMail['toMail']);
    $mail->Subject = ("FROM " . $_SESSION['email'] . " : " . $infoMail['subject']);
    $mail->Body = $_SESSION['email'] . " a l'air intéressé par votre offre, voici son message : " . $infoMail['content'];

    $mail->send();

    header("Location: /home");
}