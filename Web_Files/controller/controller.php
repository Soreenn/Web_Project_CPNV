<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */

function home()
{
    require "view/home.php";
}

function lost()
{
    require "view/lost.php";
}

function login()
{
    require "view/login.php";
}

function register()
{
    require "view/register.php";
}

function registerData($userData)
{
    require "model/data_encode.php";
    addUser($userData);
}

function authentification($userData)
{
    require "model/data_decode.php";
    loginUser($userData);
}

function catalogue()
{
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/catalogue.php";
}

function addAnnonce()
{
    require "view/addAnnonce.php";
}

function logout()
{
    session_start();
    session_destroy();
    header_remove();
    header("Location: /home");
}

function annonceInfoEncode($annonceInfo)
{
    require "model/data_encode.php";
    dataAnnonce($annonceInfo);
}

function profil()
{
    require "model/data_decode.php";
    $data = getUsers();
    require "view/profil.php";
}

function modAnnonce()
{
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/modAnnonce.php";
}

function modAnnoncePost($postId)
{
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/modAnnoncePost.php";
}

function delAnnonce()
{
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/delAnnonce.php";
}

function modAnnoncePush($data)
{
    require "model/data_encode.php";
    modAnnonceEncode($data);
}

function delAnnonceArray($postId)
{
    require "model/data_decode.php";
    deletePost($postId);
}

function varify_captcha($Captcha)
{
    require "model/varify_captcha.php";
    $userData = $Captcha;
    if (!isset($_SESSION['Register'])) {
        home();
    } else {
        registerData($userData);
    }
}

function aboutAnnounce($postId)
{
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/fullScreenAnnounce.php";
}

function formulaireDeContact($ownerEmail){
    require "model/data_decode.php";
    $data = getUsers();
    require "view/contactForm.php";
}

function sendMail($infoMail){
    require "model/sendMail.php";
    emailSending($infoMail);
}

function saveBio($formBio){
    require "model/data_encode.php";
    encodeBio($formBio);
}

function profileCheck($profile){
    require "model/data_decode.php";
    $data = getUsers();
    require "view/profilOthers.php";
}

function cart(){
    require "model/data_decode.php";
    $data = getCart();
    require "view/cart.php";
}

function checkout(){
    require "model/data_decode.php";
    $data = getCart();
    require "view/checkout.php";
}

function cartAdd($annonceId){
    require "model/data_encode.php";
    cartAddInJson($annonceId);
}

function searchByWord($search){
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/catalogueFilterWord.php";
}

function searchByTag($tag){
    require "model/data_decode.php";
    $data = getAnnounce();
    require "view/catalogueFilterTag.php";
}

function cartDel($date){
    require "model/data_encode.php";
    delCartItem($date);
}