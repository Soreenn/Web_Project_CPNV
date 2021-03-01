<?php

function addUser($userData)
{

    if ($userData['password'] == $userData['passwordConfirm']) {

        $data = file_get_contents("model/data/dataTest.json");
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
        $userAlreadyExist = 0;

        foreach ($data as $row) {
            foreach ($row as $roow) {
                if ($roow == $userData['email']) {
                    $userAlreadyExist = $userAlreadyExist + 1;
                } else {
                    $userAlreadyExist = $userAlreadyExist + 0;
                }
            }
        }

        if ($userAlreadyExist == 0) {
            echo "new user ";
            $fullUser = array(
                "email" => $userData['email'],
                "password" => $userData['password']
            );

            $data = file_get_contents("model/data/dataTest.json");
            $data = json_decode($data, JSON_OBJECT_AS_ARRAY);

            $data = (!empty($data)) ? $data : [];

            array_push($data, $fullUser);
            $data = json_encode($data, JSON_PRETTY_PRINT);

            file_put_contents("model/data/dataTest.json", $data);
            echo $userData['email'];
            if(session_start()) {
                $_SESSION['email'] = $userData['email'];
            }
            header("Location: /home");
            require "view/home.php";
        } else {
            require "view/register.php";
            echo "Email déjà existante !";
        }

    } else {
        require "view/register.php";
        echo "Mot de passe incorrect !";
    }

}