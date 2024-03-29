<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Supprimer annonce";
?>
    <!--Add start-->
    <html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <?php foreach ($data as $info) : ?>
    <?php $info['title'] = htmlentities($info['title']);?>
        <?php if ($_SESSION['admin'] == "off") : ?>
            <?php if ($info['ownerFullEmail'] == $_SESSION['email']) : ?>
                <form class="center" method="post" action="/myProfile/delAnnonce/delAnnonceArray/" enctype="multipart/form-data">
                    <input class="form-check-input" type="hidden" name="postId" value="<?= $info['annonceId'] ?>">
                    <label style="font-size: 20px" class="form-check-label"><?= $info['title'] ?></label>
                    <br>
                    <input class="btn btn-primary" type="submit" name="submit" value="Supprimer">
                </form>
            <?php endif; ?>
        <?php elseif ($_SESSION['admin'] == "on") : ?>
            <form class="center" method="post" action="/myProfile/delAnnonce/delAnnonceArray/" enctype="multipart/form-data">
                <input class="form-check-input" type="hidden" name="postId" value="<?= $info['annonceId'] ?>">
                <label style="font-size: 20px" class="form-check-label"><?= $info['title'] ?></label>
                <br>
                <input class="btn btn-primary" type="submit" name="submit" value="Supprimer">
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
    <!--Add end-->
    </body>
    </html>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>