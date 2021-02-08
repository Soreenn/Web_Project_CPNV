<?php
ob_start();
$title = "Perdu";
?>



<?php
$content = ob_get_clean();
require "gabarit.php";
?>
