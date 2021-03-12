<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Profile";
?>

<h2>Ajouter une annonce</h2>
<br>
<!--Form start-->
<div class="center">
    <form method="post" class="centerForm" action = "/addAnnonce">
        <button type="submit" class="btn btn-primary">Créer une annonce</button>
        <br>
        <br>
    </form>
    <form method="post" class="centerForm" action = "/">
        <button type="submit" class="btn btn-primary">Modifier une annonce</button>
        <br>
        <br>
    </form>
    <form method="post" class="centerForm" action = "/">
        <button type="submit" class="btn btn-primary">Supprimer une annonce</button>
    </form>
</div>
<!--Form end-->

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>