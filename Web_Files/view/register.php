<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
$title = 'Enregistrement';

ob_start();
?>
<h2>Inscription</h2>
<br>
<!--Form start-->
<div class="center">
    <form method="post" class="centerForm" action = "/register/registerData/" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="userEmail" class="form-label">Entrez votre adresse mail</label>
            <input required type="email" class="form-control" name="email" id="userEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="inputUserPsw" class="form-label">Entrez votre mot de passe</label>
            <input required type="password" class="form-control" name="password" id="inputUserPsw">
        </div>
        <div class="mb-3">
            <label for="inputConfirmPsw" class="form-label">Confirmer votre mot de passe</label>
            <input required type="password" class="form-control" name="passwordConfirm" id="inputConfirmPsw">
            <div id="passwordHelp" class="form-text">Ne partagez jamais votre mot de passe !</div>
        </div>
        <div class="mb-3">
            <label for="img">Photo de profile : </label>
            <input class="form-control form-control-sm" type="file" id="img" name="img">
        </div>
        <div class="alignLeft">
            <p>Vous possédez déjà un compte ? <a href="/login">Se connecter</a>.</p>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
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
