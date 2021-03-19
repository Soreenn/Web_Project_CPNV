<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Détails";
?>
    <html>
    <head>
    </head>
    <body>

    <br>
    <?php foreach ($data as $info) : ?>
        <?php if ($info['annonceId'] == $postId['postId']) : ?>
            <div class="card text-center">
                <div class="card-header">
                    <h1 class="display-10" style="font-size: 25px;"> <?= $info['title'] ?> </h1>
                    <?php if ($info['animaux'] !== null) : ?>
                        <span class="badge rounded-pill bg-success">Animaux</span>
                    <?php endif ; ?>
                    <?php if ($info['vehicle'] !== null ) : ?>
                        <span class="badge rounded-pill bg-warning text-dark">Véhicule</span>
                    <?php endif ; ?>
                    <?php if ($info['info'] !== null) : ?>
                        <span class="badge rounded-pill bg-primary">Informatique</span>
                    <?php endif ; ?>
                    <?php if ($info['gaming'] !== null) : ?>
                        <span class="badge rounded-pill bg-danger">Gaming</span>
                    <?php endif ; ?>
                    <?php if ($info['anime'] !== null) : ?>
                        <span class="badge rounded-pill bg-info">Anime</span>
                    <?php endif ; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <img style="width: 300px;height: 300px; object-fit: cover; object-position: 100% 0;"
                                                 src="/<?= $info['img'] ?>"></h5>
                    <hr>
                    <p class="blockText" style="font-size: 25px"><?= $info['desc'] ?></p>
                    <br>
                    <form>
                        <input type="submit" class="btn btn-secondary" value="Ajouter dans le panier">
                    </form>
                    <form method="post" action="/formulaireDeContact/">
                        <input type="hidden" name="ownerEmail" value="<?= $info['ownerFullEmail'] ?>">
                        <input type="submit" class="btn btn-secondary" value="Contacter l'annonceur via formulaire">
                    </form>
                </div>
                <div class="card-footer">
                    <h1 class="display-10" style="font-size: 30px;"><?= $info['price'] ?></h1>
                    <span style="font-size: 20px;">Proposé par </span> <span style="font-size: 20px;text-transform: capitalize"> : <?= $info['owner'] ?></span>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </body>
    </html>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>