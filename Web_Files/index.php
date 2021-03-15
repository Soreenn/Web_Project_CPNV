<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "controller/controller.php";

switch ($_SERVER["REQUEST_URI"]) {
    case "/" :
    case "/home" :
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            catalogue();
        }
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
    case "/addAnnonce":
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            addAnnonce();
        }
        break;
    case "/profile" :
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            profil();
        }
        break;
    case "/annonceInfoEncode" :
        if (!isset($_POST)) {
            home();
        } else {
            annonceInfoEncode($_POST);
        }
    case "/modAnnonce" :
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            modAnnonce();
        }
        break;
    case "/modAnnoncePost" :
        if (!isset($_POST)) {
            home();
        } else {
            modAnnoncePost($_POST);
        }
        break;
    case "/delAnnoncePost" :
        if (!isset($_POST)) {
            home();
        } else {
            delAnnoncePost($_POST);
        }
        break;
    default:
        lost();
}