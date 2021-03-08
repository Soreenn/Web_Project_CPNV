<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
ob_start();
$title = "Catalogue";
?>

    <!--Home start-->
    <html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

    <div class="title">

    </div>

    </body>
    </html>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>