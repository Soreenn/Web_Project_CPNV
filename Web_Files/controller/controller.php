<?php

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

function logout(){
    session_start();
    session_destroy();
    header("Location: /home");
    require "view/home.php";
}