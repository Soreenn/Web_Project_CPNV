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
        <div class="alignPDP">
            <img src="<?= $_SESSION['pdp'] ?>" class="rounded-circle" style="width: 300px; height: 300px">
        </div>
        <div>
            <h2 class="profil-title"><?= $_SESSION['name'] ?></h2>
        </div>
        <br>
    </div>
    <!--Form start-->
    <div class="center">
        <form method="post" class="centerForm" action="/myProfile/addAnnonce/">
            <button type="submit" class="btn btn-primary">Créer une annonce</button>
            <br>
            <br>
        </form>
        <form method="post" class="centerForm" action="/myProfile/modAnnonce/">
            <button type="submit" class="btn btn-primary">Modifier une annonce</button>
            <br>
            <br>
        </form>
            <form method="post" class="centerForm" action="/myProfile/delAnnonce/">
                <button type="submit" class="btn btn-primary">Supprimer une annonce</button>
            </form>
    </div>
    <!--Form end-->

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>