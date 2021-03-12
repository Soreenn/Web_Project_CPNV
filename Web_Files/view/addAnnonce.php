<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
$title = 'Créer annonce';

ob_start();
?>
<h2>Ajouter une annonce</h2>
<br>
<!--Form start-->
<div class="center">
    <form method="post" class="centerForm" action = "/annonceInfoEncode"  enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" required class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description :</label>
            <textarea required class="form-control" name="desc" id="desc"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix :</label>
            <input type="number" required class="form-control" name="price" id="price">
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags :</label>
            <input type="hidden" id="tags">
            <hr>
            <label for="animaux" class="form-check-label">Animaux : </label>
            <input type="checkbox" class="form-check-input" name="animaux" id="animaux">
            <br>
            <label for="vehicle" class="form-check-label">Véhicule : </label>
            <input type="checkbox" class="form-check-input" name="vehicle" id="vehicle">
            <br>
            <label for="info" class="form-check-label">Informatique : </label>
            <input type="checkbox" class="form-check-input" name="info" id="info">
            <br>
            <label for="gaming" class="form-check-label">Gaming : </label>
            <input type="checkbox" class="form-check-input" name="gaming" id="gaming">
            <hr>
        </div>
        <div class="mb-3">
            <label for="img">Photo de l'annonce : </label>
            <input class="form-control form-control-sm" type="file" id="img" name="img">
        </div>
        <div class="mb-3">
            <input required type="checkbox" class="form-check-input" name="accept" id="accept">
            <label for="accept" class="form-check-label"><p class="text-danger">J'accepte que ma photo soit publié sur internet</p></label>
        </div>
        <button type="submit" class="btn btn-primary">Publier</button>
        <br>
    </form>
</div>
<!--Form end-->
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
