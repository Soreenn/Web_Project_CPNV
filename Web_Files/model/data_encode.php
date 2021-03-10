<?php

function addUser($userData)
{

    if ($userData['password'] == $userData['passwordConfirm']) {
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
        header("Location: /home");

        if(substr_count($userData['email'], ".") > 1){
            $name = strtok($userData['email'], '.');
        } else{
            $name = strtok($userData['email'], '@');
        }

        if (session_start()) {
            $_SESSION['email'] = $userData['email'];
            $_SESSION['name'] = $name;
        }

        require "/view/home.php";
    }
}