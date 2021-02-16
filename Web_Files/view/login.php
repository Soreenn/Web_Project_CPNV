<?php
ob_start();
$title = "Connexion";
?>
    <!--Login start-->
   <div>
       <div class="logo">
        <img class="img-thumbnail" src="/view/content/images/octobis.svg">
       </div>
       <div class="form-div">

       </div>
   </div>
    <!--Login end-->
<?php
$content = ob_get_clean();
require_once "view/gabarit.php";
?>