<?php
ob_start();
$title = "Accueil";
?>

<h1>Test</h1>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>