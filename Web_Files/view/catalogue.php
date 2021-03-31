<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
header_remove();
ob_start();
$title = "Catalogue";
?>

<!--Home start-->
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="center">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($data as $info) : ?>
            <div class="col">
                <?php $info['owner'] = htmlentities($info['owner']); ?>
                <?php $info['title'] = htmlentities($info['title']); ?>
                <?php $info['desc'] = htmlentities($info['price']); ?>
                <div class="card h-100">
                    <div class="image">
                        <img style="width: 300px;height: 300px; object-fit: cover; object-position: 100% 0;"
                             src="/<?= $info['img'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <?php if ($info['animaux'] !== null) : ?>
                            <span class="badge rounded-pill bg-success">Animaux</span>
                        <?php endif; ?>
                        <?php if ($info['vehicle'] !== null) : ?>
                            <span class="badge rounded-pill bg-warning text-dark">Véhicule</span>
                        <?php endif; ?>
                        <?php if ($info['info'] !== null) : ?>
                            <span class="badge rounded-pill bg-primary">Informatique</span>
                        <?php endif; ?>
                        <?php if ($info['mobilier'] !== null) : ?>
                            <span class="badge rounded-pill bg-danger">Mobilier</span>
                        <?php endif; ?>
                        <?php if ($info['manga'] !== null) : ?>
                            <span class="badge rounded-pill bg-info">Manga</span>
                        <?php endif; ?>
                        <?php if ($info['service'] !== null) : ?>
                            <span class="badge rounded-pill bg-secondary">Services</span>
                        <?php endif; ?>
                        <?php if ($info['jouet'] !== null) : ?>
                            <span class="badge rounded-pill bg-warning">Jouet</span>
                        <?php endif; ?>
                        <?php if ($info['location'] !== null) : ?>
                            <span class="badge rounded-pill bg-sucess">Location</span>
                        <?php endif; ?>
                        <h5 class="card-title"><?= $info['title'] ?></h5>
                        <form method="post" action="/home/aboutAnnounce">
                            <input type="hidden" value="<?= $info['annonceId'] ?>" name="postId">
                            <input class="btn btn-secondary" type="submit" value="Voir plus à propos" name="seeMore"
                                   id="seeMore">
                        </form>
                    </div>
                    <div class="card-footer">
                        <small> <?= $info['price'] ?> </small>
                        <br>
                        <small class="text-muted"> Proposé par : <?= $info['owner'] ?> </small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>
