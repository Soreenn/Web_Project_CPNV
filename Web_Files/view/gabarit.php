<?php
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" href="#">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Se connecter</a>
                    </li>
                </ul>
            </div>
            <!--Col auto end-->
        </div>
    </div>
</nav>
<!-- Navbar end-->

<!-- Page content start-->
<?= $content; ?>
<!-- Page content end-->
<script src=/view/content/js/bootstrap.bundle.js></script>
</body>
</html>
