<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
ob_start();
$title = "Accueil";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

    <!--Home start-->
    <html>
    <head>
        <meta charset="utf-8">
    </head>
<body>

<?php if (!isset($_SESSION['email'])) : ?>
    <div class="home">
        <div class="center">
            <h1>Ali-Bis</h1>
            <h3>"Une infinité d'annonces"</h3>
        </div>
        <div class="center-bottom">
            <h2>Veuillez-vous <a href="/view/login.php">identifier</a></h2>
            <small>Pas de compte ? <a href="/view/register.php">Créez en un !</a></small>
        </div>
    </div>
<?php endif; ?>

    </body>
    </html>
    <!--Home end-->

    <?php
    $content = ob_get_clean();
    require "view/gabarit.php";
    ?>