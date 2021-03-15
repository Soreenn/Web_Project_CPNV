<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function addUser($userData)
{
    $file_name = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
        move_uploaded_file($file_tmp, "view/content/images/" . $file_name);
    } else {
        header_remove();
        header("Location: /register");
    }

    if ($userData['password'] == $userData['passwordConfirm']) {
        $fullUser = array(
            "email" => $userData['email'],
            "password" => $userData['password'],
            "pdp" => "view/content/images/" . $file_name
        );

        $data = file_get_contents("model/data/dataTest.json");
        $data = json_decode($data, JSON_OBJECT_AS_ARRAY);

        $data = (!empty($data)) ? $data : [];

        array_push($data, $fullUser);
        $data = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents("model/data/dataTest.json", $data);

        if (substr_count($userData['email'], ".") > 1) {
            $name = strtok($userData['email'], '.');
        } else {
            $name = strtok($userData['email'], '@');
        }

        if (session_start()) {
            $_SESSION['email'] = $userData['email'];
            $_SESSION['name'] = $name;
            $_SESSION['pdp'] = "view/content/images/" . $file_name;
        }

        header_remove();
        header("Location: /home");
    }
}

function dataAnnonce($annonceInfo)
{
    $file_name = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
        move_uploaded_file($file_tmp, "view/content/images/" . $file_name);
    } else {
        header_remove();
        header("Location: /home");
    }

    $needle = '<script>';

    if (strpos($annonceInfo['desc'], $needle) || strpos($annonceInfo['title'], $needle) || strpos($annonceInfo['price'], $needle) !== false) {
        header_remove();
        header("Location: /home");
    } else {
        $number = rand (1, 1000000);
        $annonce = array(
            "annonceId" => $number,
            "title" => $annonceInfo['title'],
            "desc" => $annonceInfo['desc'],
            "price" => $annonceInfo['price'] . " CHF",
            "img" => "view/content/images/" . $file_name,
            "owner" => $_SESSION['name'],
            "animaux" => array_search('animaux', $annonceInfo, true) ? $annonceInfo['animaux'] : null,
            "info" => array_search('info', $annonceInfo, true) ? $annonceInfo['info'] : null,
            "vehicle" => array_search('vehicle', $annonceInfo, true) ? $annonceInfo['vehicle'] : null,
            "gaming" => array_search('gaming', $annonceInfo, true) ? $annonceInfo['gaming'] : null,
            "ownerFullEmail" => $_SESSION['email']
        );
    }

    $data = file_get_contents("model/data/annonce.json");
    $data = json_decode($data, JSON_OBJECT_AS_ARRAY);
    $data = (!empty($data)) ? $data : [];

    array_push($data, $annonce);
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("model/data/annonce.json", $data);
    header_remove();
    header("Location: /home");
}