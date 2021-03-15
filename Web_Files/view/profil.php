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
            <h2>Profile de <?= $_SESSION['name'] ?></h2>
        </div>
        <br>
        <div class="alignPDP">
            <img src="<?= $_SESSION['pdp'] ?>" class="rounded-circle">
        </div>
    </div>
    <!--Form start-->
    <div class="center">
        <form method="post" class="centerForm" action="/addAnnonce">
            <button type="submit" class="btn btn-primary">Créer une annonce</button>
            <br>
            <br>
        </form>
        <form method="post" class="centerForm" action="/">
            <button type="submit" class="btn btn-primary">Modifier une annonce</button>
            <br>
            <br>
        </form>
            <form method="get" class="centerForm" action="/">
                <button type="submit" class="btn btn-primary">Supprimer une annonce</button>
            </form>
    </div>
    <!--Form end-->

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>