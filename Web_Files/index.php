<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */

require "controller/controller.php";

switch ($_SERVER["REQUEST_URI"]){
    case "/" :
    case "/home" :
        home();
        break;
    case "/login" :
        login();
        break;
    case "/authentification" :
        authentification($_POST);
        break;
    case "/register" :
        register();
        break;
    case "/logout" :
        logout();
        break;
    case "/registerData" :
        registerData($_POST);
        break;
    default:
        lost();
}