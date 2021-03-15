<?php
header_remove();
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */

function home(){
    require "view/home.php";
}

function lost(){
    require "view/lost.php";
}

function login(){
    require "view/login.php";
}

function register(){
    require "view/register.php";
}

function registerData($userData){
    require "model/data_encode.php";
    addUser($userData);
}

function authentification($userData){
    require "model/data_decode.php";
    loginUser($userData);
}

function catalogue(){
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/catalogue.php";
}

function addAnnonce(){
    require "view/addAnnonce.php";
}

function logout(){
    session_start();
    session_destroy();
    header_remove();
    header("Location: /home");
}

function annonceInfoEncode($annonceInfo){
    require "model/data_encode.php";
    dataAnnonce($annonceInfo);
}

function profil(){
    require "view/profil.php";
}

function modAnnonce(){
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/modAnnonce.php";
}

function modAnnoncePost($postId){
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/modAnnoncePost.php";
}

function delAnnoncePost(){
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/modAnnoncePost.php";
}