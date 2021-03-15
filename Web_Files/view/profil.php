<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Profile";
?>

    <div>
        <div>
            <h2>Mon profile</h2>
        </div>
        <br>
        <div class="center">
            <img src="<?= $_SESSION['pdp'] ?>" class="rounded-circle" style="width: 300px; height: 300px">
            <br>
            <h1 class="display-2s" style="text-transform: capitalize"><?= $_SESSION['name'] ?></h1>
        </div>
    </div>
    <br>
    <!--Form start-->
    <div class="center">
        <form method="post" class="centerForm" action="/addAnnonce">
            <button type="submit" class="btn btn-primary">Créer une annonce</button>
        </form>
        <br>
        <form method="post" class="centerForm" action="/modAnnonce">
            <button type="submit" class="btn btn-primary">Modifier une annonce</button>
        </form>
        <br>
        <form method="post" class="centerForm" action="/delAnnonce">
            <button type="submit" class="btn btn-primary">Supprimer une annonce</button>
        </form>
    </div>
    <!--Form end-->

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>