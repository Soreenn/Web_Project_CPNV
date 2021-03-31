<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<html lang="fr">
<head>
    <!DOCTYPE HTML>
    <meta name= "description" content= "Site d'annonces Ali-Bis! Une infinité d'annonce pour tous.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/view/content/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/view/content/css/stylesheet.css">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <link rel="icon" href="/view/content/images/octobis.jpg">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="nav navbar-nav navbar-right col-lg-1 col-md-4 col-4">
        <li>
            <a class="navbar-brand" href="/home/">Ali-Bis</a>
        </li>
    </ul>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav col-lg-5 col-md-4 col-4">
            <li class="nav-item active">
                <?php if (isset($_SESSION['email'])) : ?>
                    <span class="nav-link"><?= "Bienvenue " . ($_SESSION['name']) ?></span>
                <?php else : ?>
                    <a class="nav-link" href="/login">Se connecter</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['email'])) : ?>
                    <a class="nav-link" href="/myProfile">Mon profile</a>
                <?php else : ?>
                    <a class="nav-link" href="/register">S'inscrire</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['email'])) : ?>
                    <a class="nav-link" href="/cart">Mon panier</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if (isset($_SESSION['email'])) : ?>
                    <a class="nav-link" href="/logout">Se déconnecter</a>
                <?php endif; ?>
            </li>
        </ul>
        <ul class="navbar-nav col-lg-auto col-md-auto col-auto">
            <li class="nav-item">
                <table>
                    <form method="post" action="/searchByWord/">
                        <td>
                            <?php if (isset($_SESSION['email'])) : ?>
                                <input name="search" class="form-control bg-light long-bar" type="search"
                                       placeholder="Search">
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (isset($_SESSION['email'])) : ?>
                                <button class="btn btn-light" type="submit">Rechercher</button>
                            <?php endif; ?>
                        </td>
                    </form>
                    <td>
                        <?php if (isset($_SESSION['email'])) : ?>
                            <span class="nav-link"> Ou </span>
                        <?php endif; ?>
                    </td>
                </table>
            </li>
            <li class="nav-item">
                <table>
                    <td>
                        <?php if (isset($_SESSION['email'])) : ?>
                        <form method="post" action="/searchByTag/">
                    <td>
                        <select name="tag" id="tag" class="form-select">
                            <option selected>Catégorie</option>
                            <option value="animaux">Animaux</option>
                            <option value="vehicle">Véhicule</option>
                            <option value="info">Informatique</option>
                            <option value="mobilier">Mobilier</option>
                            <option value="manga">Manga</option>
                            <option value="service">Service</option>
                            <option value="jouet">Jouet</option>
                            <option value="location">Location</option>
                        </select>
                    <td>
                        <button class="btn btn-light" type="submit">Ok</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </table>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>
<!-- Navbar end-->

<!-- Page content start-->
<?= $content; ?>
<!-- Page content end-->
<br>
<br>
<!-- <footer>
    <div class="footer-copyright">
        <span>
            ali-bis.ch n’est pas responsable du contenu des annonces.
        </span>
        <br>
        <span>
            © Copyright Ali-bis SA 2021. Tous droits réservés.
        </span>
    </div>
</footer> -->
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</html>