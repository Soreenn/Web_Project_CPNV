<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Profile";
$_SESSION['name'] = htmlentities($_SESSION['name']);
?>

    <div class="center">
        <div>
            <h2>Voici votre profil <?= $_SESSION['name'] ?> !</h2>
        </div>
        <br>
        <div>
            <img src="/<?= $_SESSION['pdp'] ?>" class="rounded-circle" style="width: 300px; height: 300px">
            <?php if ($_SESSION['admin'] == "on") : ?>
                <h1><span class="badge bg-danger">ADMIN</span></h1>
            <?php endif; ?>
        </div>
        <br>
        <br>
    </div>
    <!--Form start-->
    <div class="center">
        <form method="post" class="boutonAlign" action="/myProfile/addAnnonce/">
            <button type="submit" class="btn btn-secondary">Créer une annonce</button>
        </form>
        <form method="post" class="boutonAlign" action="/myProfile/modAnnonce/">
            <button type="submit" class="btn btn-secondary">Modifier une annonce</button>
        </form>
        <form method="post" class="boutonAlign" action="/myProfile/delAnnonce/">
            <button type="submit" class="btn btn-secondary">Supprimer une annonce</button>
        </form>
        <br>
        <br>
        <?php foreach ($data as $info) : ?>
            <?php if ($info['email'] == $_SESSION['email']) : ?>
                <?php $info['bio'] = htmlentities($info['bio']); ?>
                <form method="post" action="/myProfile/saveBio/">
                    <label for="ameliorer" class="textPolice">Partagez votre humeur !</label>
                    <br>
                    <br>
                    <textarea style="resize: none" class="form-control" name="ameliorer" id="ameliorer" rows="7"
                              cols="100"><?= $info['bio'] ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-secondary">Sauvegarder</button>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <!--Form end-->

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>