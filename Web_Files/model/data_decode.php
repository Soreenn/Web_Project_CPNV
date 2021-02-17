<?php

$data = file_get_contents("data/dataTest.json");
$data = json_decode($data);
foreach ($data as $row){
    echo '<pre>';
    print_r($row);
    echo '</pre>';
}