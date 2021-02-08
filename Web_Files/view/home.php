<?php
ob_start();
$title = "Accueil";
?>

<!--Home start-->

<html>
<head>
    <meta charset="utf-8";
</head>
<body>
    <div>  
        <h1>Ali-Bis</h1>
        <h3>"Une infinité d'annonces"</h3>
        <h2>Veuillez-vous identifier</h2>
        <p>Pas de compte ? Créez en un !</p>
    </div>
    <div>

    </div>

</body>
</html>

<!--Home end-->

<?php
$content = ob_get_clean();
require_once "view/gabarit.php";
?>