<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
$title = 'Modifier Annonce';

ob_start();
$_SESSION['postId'] = $postId['postId']
?>
<h2>Modifier annonce</h2>
<br>
<!--Form start-->
<?php foreach ($data as $info) : ?>
    <?php if ($info['annonceId'] == $_SESSION['postId']) : ?>
        <?php $price = strtok($info['price'], ' CHF'); ?>
        <div class="center">
            <form method="post" class="centerForm was-validated"
                  action="/myProfile/modAnnonce/modAnnoncePost/modAnnoncePush/" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Titre :</label>
                    <input value="<?= $info['title'] ?>" type="text" required class="form-control" name="title"
                           id="title">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description :</label>
                    <textarea required class="form-control" name="desc" id="desc"><?= $info['desc'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix :</label>
                    <input value="<?= $price ?>" type="number" required class="form-control" name="price" id="price">
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags :</label>
                    <input type="hidden" id="tags">
                    <hr>
                    <label for="animaux" class="form-check-label">Animaux : </label>
                    <input <?php if ($info['animaux'] == "on") echo "checked"; ?> type="checkbox"
                                                                                  class="form-check-input"
                                                                                  name="animaux"
                                                                                  id="animaux">
                    <br>
                    <label for="vehicle" class="form-check-label">Véhicule : </label>
                    <input <?php if ($info['vehicle'] == "on") echo "checked"; ?> type="checkbox"
                                                                                  class="form-check-input"
                                                                                  name="vehicle" id="vehicle">
                    <br>
                    <label for="info" class="form-check-label">Informatique : </label>
                    <input <?php if ($info['info'] == "on") echo "checked"; ?> type="checkbox" class="form-check-input"
                                                                               name="info" id="info">
                    <br>
                    <label for="mobilier" class="form-check-label">Mobilier : </label>
                    <input <?php if ($info['mobilier'] == "on") echo "checked"; ?> type="checkbox"
                                                                                   class="form-check-input"
                                                                                   name="mobilier" id="mobilier">
                    <br>
                    <label for="manga" class="form-check-label">Manga : </label>
                    <input <?php if ($info['manga'] == "on") echo "checked"; ?> type="checkbox" class="form-check-input"
                                                                                name="manga" id="manga">
                    <br>
                    <label for="service" class="form-check-label">Service : </label>
                    <input <?php if ($info['service'] == "on") echo "checked"; ?> type="checkbox"
                                                                                  class="form-check-input"
                                                                                  name="service" id="service">
                    <br>
                    <label for="jouet" class="form-check-label">Jouet : </label>
                    <input <?php if ($info['jouet'] == "on") echo "checked"; ?> type="checkbox" class="form-check-input"
                                                                                name="jouet" id="jouet">
                    <br>
                    <label for="location" class="form-check-label">Location : </label>
                    <input <?php if ($info['location'] == "on") echo "checked"; ?> type="checkbox"
                                                                                   class="form-check-input"
                                                                                   name="location" id="location">
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="img">Photo de l'annonce : </label>
                    <input required class="form-control form-control-sm" type="file" id="img" name="img">
                </div>
                <div class="mb-3">
                    <input required type="checkbox" class="form-check-input" name="accept" id="accept">
                    <label for="accept" class="form-check-label"><p class="text-danger">J'accepte que ma photo soit
                            publié sur internet</p></label>
                </div>
                <button type="submit" class="btn btn-primary">Publier</button>
                <br>
            </form>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
<!--Form end-->
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
