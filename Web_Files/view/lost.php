<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
ob_start();
$title = "Perdu";
?>



<?php
$content = ob_get_clean();
require "gabarit.php";
?>
