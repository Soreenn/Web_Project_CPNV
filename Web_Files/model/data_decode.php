<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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

                if (substr_count($userData['email'], ".") > 1) {
                    $name = strtok($userData['email'], '.');
                } elseif (substr_count($userData['email'], ".") < 2) {
                    $name = strtok($userData['email'], '@');
                } elseif (substr_count($userData['email'], "-") > 0) {
                    $name = strtok($userData['email'], '-');
                }
                if (session_start()) {
                    $_SESSION['email'] = $userData['email'];
                    $_SESSION['name'] = $name;
                    $_SESSION['pdp'] = $row['pdp'];
                }
                header("Location: /home");
            } else {
                header("Location: /login");
            }
        }
    }
}

function getAnnounce()
{
    $data = file_get_contents("model/data/annonce.json");
    $data = json_decode($data, true);
    return $data;
}

function getUsers()
{
    $data = file_get_contents("model/data/dataTest.json");
    $data = json_decode($data, true);
    return $data;
}

function deletePost($postId)
{
    $data = file_get_contents("model/data/annonce.json");
    $data = json_decode($data, true);
    $arr_index = array();

    foreach ($data as $key => $value) {
        if ($value['annonceId'] == $postId['postId']) {
            $arr_index[] = $key;
        }
    }

    foreach ($arr_index as $i) {
        unset($data[$i]);
    }

    $data = array_values($data);

    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("model/data/annonce.json", $data);

    header("Location: /home");
}