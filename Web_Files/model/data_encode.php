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

        header("Location: /home");
    }
}

function dataAnnonce($annonceInfo)
{
    $file_name = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' | $extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG' || $extension == 'GIF') {
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
        $number = rand(1, 1000000);
        $annonce = array(
            "annonceId" => $number,
            "title" => $annonceInfo['title'],
            "desc" => $annonceInfo['desc'],
            "price" => $annonceInfo['price'] . " CHF",
            "img" => "view/content/images/" . $file_name,
            "owner" => $_SESSION['name'],
            "animaux" => isset($annonceInfo['animaux']) ? $annonceInfo['animaux'] : null,
            "info" => isset($annonceInfo['info']) ? $annonceInfo['info'] : null,
            "vehicle" => isset($annonceInfo['vehicle']) ? $annonceInfo['vehicle'] : null,
            "gaming" => isset($annonceInfo['gaming']) ? $annonceInfo['gaming'] : null,
            "anime" => isset($annonceInfo['anime']) ? $annonceInfo['anime'] : null,
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

function modAnnonceEncode($annonceInfo)
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
        header("Location: /home");
    } else {
        $number = rand(1, 1000000);
        $annonce = array(
            "annonceId" => $number,
            "title" => $annonceInfo['title'],
            "desc" => $annonceInfo['desc'],
            "price" => $annonceInfo['price'] . " CHF",
            "img" => "view/content/images/" . $file_name,
            "owner" => $_SESSION['name'],
            "animaux" => isset($annonceInfo['animaux']) ? $annonceInfo['animaux'] : null,
            "info" => isset($annonceInfo['info']) ? $annonceInfo['info'] : null,
            "vehicle" => isset($annonceInfo['vehicle']) ? $annonceInfo['vehicle'] : null,
            "gaming" => isset($annonceInfo['gaming']) ? $annonceInfo['gaming'] : null,
            "anime" => isset($annonceInfo['anime']) ? $annonceInfo['anime'] : null,
            "ownerFullEmail" => $_SESSION['email']
        );
    }

    $data = file_get_contents("model/data/annonce.json");
    $data = json_decode($data, true);
    $arr_index = array();

    foreach ($data as $key => $value) {
        if ($value['annonceId'] == $_SESSION['postId']) {
            $arr_index[] = $key;
        }
    }

    foreach ($arr_index as $i) {
        unset($data[$i]);
    }

    $data = array_values($data);

    $data = (!empty($data)) ? $data : [];

    array_push($data, $annonce);
    $data = json_encode($data, JSON_PRETTY_PRINT);

    unset($_SESSION['postId']);

    file_put_contents("model/data/annonce.json", $data);
    header("Location: /home");
}