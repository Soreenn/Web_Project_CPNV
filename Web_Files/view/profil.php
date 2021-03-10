<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Profile";
?>



<?php




echo "microwave";
?>




<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>