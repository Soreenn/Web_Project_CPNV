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
            <div class="card h-100">
                <img src="<?= $info['img'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
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
                    <h5 class="card-title"><?= $info['title'] ?></h5>
                    <p class="card-text"><?= $info['desc'] ?></p>
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
