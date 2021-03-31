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
        move_uploaded_file($file_tmp, "view/content/images/" . date("d-m-y_H-m-s") . $file_name);
    } else {
        header_remove();
        header("Location: /register");
    }

    $hashPassword = password_hash($userData['password'], PASSWORD_DEFAULT);

    $pattern = "/^[a-zA-Z.-]+@[a-zA-Z.-]+\.[a-zA-Z]+$/i";
    if (!preg_match($pattern, $userData['email'])) {
        header("Location: /home");
        exit();
    }

    if ($userData['password'] == $userData['passwordConfirm']) {
        $fullUser = array(
            "email" => $userData['email'],
            "password" => $hashPassword,
            "bio" => "Welcome to you!",
            "pdp" => "view/content/images/" . $file_name,
            "admin" => "off"
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
            $_SESSION['admin'] = "off";
        }

        unset($_SESSION['Register']);
        header("Location: /home");
    }
}

function dataAnnonce($annonceInfo)
{
    $file_name = $_FILES['img']['name'];
    $file_tmp = $_FILES['img']['tmp_name'];
    $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif' | $extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG' || $extension == 'GIF') {
        move_uploaded_file($file_tmp, "view/content/images/" .  date("d-m-y_H-m-s") . $file_name);
    } else {
        header_remove();
        header("Location: /home");
    }

    $pattern = '/^\d{1,9}$/i';

    if (!preg_match($pattern, $annonceInfo['price'])) {
        header("Location: /home");
        exit();
    }

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
        "mobilier" => isset($annonceInfo['mobilier']) ? $annonceInfo['mobilier'] : null,
        "manga" => isset($annonceInfo['manga']) ? $annonceInfo['manga'] : null,
        "service" => isset($annonceInfo['service']) ? $annonceInfo['service'] : null,
        "jouet" => isset($annonceInfo['jouet']) ? $annonceInfo['jouet'] : null,
        "location" => isset($annonceInfo['location']) ? $annonceInfo['location'] : null,
        "ownerFullEmail" => $_SESSION['email']
    );

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
        move_uploaded_file($file_tmp, "view/content/images/" .  date("d-m-y_H-m-s") . $file_name);
    } else {
        header_remove();
        header("Location: /home");
    }

    $pattern = '/^\d{1,9}$/i';

    if (!preg_match($pattern, $annonceInfo['price'])) {
        header("Location: /home");
        exit();
    }

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
        "mobilier" => isset($annonceInfo['mobilier']) ? $annonceInfo['mobilier'] : null,
        "manga" => isset($annonceInfo['manga']) ? $annonceInfo['manga'] : null,
        "service" => isset($annonceInfo['service']) ? $annonceInfo['service'] : null,
        "jouet" => isset($annonceInfo['jouet']) ? $annonceInfo['jouet'] : null,
        "location" => isset($annonceInfo['location']) ? $annonceInfo['location'] : null,
        "ownerFullEmail" => $_SESSION['email']
    );

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

function encodeBio($formBio)
{
    $data = file_get_contents("model/data/dataTest.json");
    $data = json_decode($data, true);
    $arr_index = array();

    foreach ($data as $key => $value) {
        if ($value['email'] == $_SESSION['email']) {
            $arr_index[] = $key;
        }
    }

    foreach ($arr_index as $i) {
        $data[$i]['bio'] = $formBio['ameliorer'];
    }

    $data = array_values($data);

    $data = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents("model/data/dataTest.json", $data);
    header("Location: /myProfile/");
}

function cartAddInJson($annonceId)
{
    $dataAll = file_get_contents("model/data/annonce.json");
    $dataAll = json_decode($dataAll, true);

    foreach ($dataAll as $key => $value) {
        if ($value['annonceId'] == $annonceId['id']) {
            $data = file_get_contents("model/data/cart.json");
            $data = json_decode($data, true);

            $cart = array(
                "id" => $value['annonceId'],
                "email" => $_SESSION['email'],
                "title" => $value['title'],
                "price" => $value['price'],
                "ownerEmail" => $value['ownerFullEmail'],
                "date" => date('d/m/y H:m')
            );
            array_push($data, $cart);

            $data = json_encode($data, JSON_PRETTY_PRINT);

            file_put_contents("model/data/cart.json", $data);
        }
    }
    header("Location: /home/");
}

function delCartItem($date)
{
    $data = file_get_contents("model/data/cart.json");
    $data = json_decode($data, true);
    $arr_index = array();

    foreach ($data as $key => $value) {
        if ($value['date'] == $date['date']) {
            $arr_index[] = $key;
        }
    }

    foreach ($arr_index as $i) {
        unset($data[$i]);
    }

    $data = array_values($data);

    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents("model/data/cart.json", $data);

    header("Location: /cart");
}