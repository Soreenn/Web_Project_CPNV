<?php
ob_start();
$title = "Perdu";
?>

<h1>Oh oh, il semblerait que tu sois perdu :(</h1>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
