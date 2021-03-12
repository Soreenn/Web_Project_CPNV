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

<html>
<head>
    <title><?= $title; ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/view/content/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/view/content/css/stylesheet.css">
</head>
<body>

<!-- Navbar start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">Ali-Bis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--Col auto start-->
        <div class="col-auto">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php if (isset($_SESSION['email'])) : ?>
                        <a class="nav-link" href="/logout">Se déconnecter</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['email'])) : ?>
                        <a class="nav-link" href="/profile">Mon profile</a>
                        <?php else : ?>
                            <a class="nav-link" href="/register">S'inscrire</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['email'])) : ?>
                        <span class="nav-link"><?= "Bienvenue " . ($_SESSION['name']) ?></span>
                        <?php else : ?>
                            <a class="nav-link" href="/login">Se connecter</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
            <!--Col auto end-->
        </div>
    </div>
</nav>
<br>
<br>
<br>
<br>
<!-- Navbar end-->

<!-- Page content start-->
<?= $content; ?>
<!-- Page content end-->
<script src=/view/content/js/bootstrap.bundle.js></script>
<br>
<br>
<footer>
    <div class="footer-copyright">
        <span>
            ali-bis.ch n’est pas responsable du contenu des annonces.
        </span>
        <br>
        <span>
            © Copyright Ali-bis SA 2021. Tous droits réservés.
        </span>
    </div>
</footer>
</body>
</html>
