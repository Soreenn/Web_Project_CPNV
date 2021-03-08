<?php

function loginUser($userData)
{
    $data = file_get_contents("model/data/dataTest.json", true);
    $data = json_decode($data, true);
    $userAlreadyExist = 0;
    $error = 0;

    $i = 0;
    $id = -1;

    foreach ($data as $row) {
        if ($row['email'] == $userData['email']) {
            if ($row['password'] == $userData['password']) {
                if (session_start()) {
                    $_SESSION['email'] = $userData['email'];
                }
                header("Location: /home");
                require "view/home.php";
            } else {
                header("Location: /login");
                require "view/login.php";
            }
        }
    }
}

function getAnnounce(){
    $data = file_get_contents("model/data/annonce.json", true);
    $data = json_decode($data, true);
    return $data;
}