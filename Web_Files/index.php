<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
header_remove();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "controller/controller.php";

switch ($_SERVER["REQUEST_URI"]) {
    case "/" :
    case "/home" :
    case "/home/" :
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            catalogue();
        }
        break;

    case "/login" :
    case "/login/" :
        login();
        break;

    case "/login/authentification" :
    case "/login/authentification/" :
        authentification($_POST);
        break;

    case "/register" :
    case "/register/" :
        register();
        break;

    case "/logout" :
    case "/logout/" :
        logout();
        break;

    case "/register/registerData" :
    case "/register/registerData/" :
        registerData($_POST);
        break;

    case "/myProfile/addAnnonce":
    case "/myProfile/addAnnonce/":
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            addAnnonce();
        }
        break;

    case "/myProfile" :
    case "/myProfile/" :
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            profil();
        }
        break;

    case "/myProfile/addAnnonce/annonceInfoEncode" :
    case "/myProfile/addAnnonce/annonceInfoEncode/" :
        if (!isset($_POST)) {
            home();
        } else {
            annonceInfoEncode($_POST);
        }
        break;

    case "/myProfile/modAnnonce" :
    case "/myProfile/modAnnonce/" :
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            modAnnonce();
        }
        break;

    case "/myProfile/modAnnonce/modAnnoncePost" :
    case "/myProfile/modAnnonce/modAnnoncePost/" :
        if (!isset($_POST)) {
            home();
        } else {
            modAnnoncePost($_POST);
        }
        break;

    case "/myProfile/delAnnonce" :
    case "/myProfile/delAnnonce/" :
        if (!isset($_SESSION['email'])) {
            home();
        } else {
            delAnnonce();
        }
        break;

    case "/myProfile/delAnnonce/delAnnonceArray" :
    case "/myProfile/delAnnonce/delAnnonceArray/" :
        if (!isset($_POST)) {
            home();
        } else {
            delAnnonceArray($_POST);
        }
        break;

    case "/myProfile/modAnnonce/modAnnoncePost/modAnnoncePush" :
    case "/myProfile/modAnnonce/modAnnoncePost/modAnnoncePush/" :
        if (!isset($_POST)) {
            home();
        } else {
            modAnnoncePush($_POST);
        }
        break;

    default:
        lost();
}