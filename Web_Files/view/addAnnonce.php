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
    <form method="post" class="centerForm" action = "/">
        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" required class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description :</label>
            <textarea required class="form-control" name="desc" id="desc"></textarea>
        </div>

        <div class="alignLeft">
            <p>Besoin d'un compte ? <a href="/register">S'inscrire</a>.</p>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Se connecter</button>
        <br>
        <br>
        <button type="reset" class="btn btn-primary">Effacer</button>

    </form>
</div>
<!--Form end-->
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>
