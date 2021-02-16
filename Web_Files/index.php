<?php
require "controller/navigation.php";

switch ($_SERVER["REQUEST_URI"]){
    case "/" :
    case "/home" :
        home();
        break;
    case "/login" :
        login();
        break;
    default:
        lost();
}