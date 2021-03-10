<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
$title = 'Login';

ob_start();
?>
<h2>Connexion</h2>
<br>
<!--Form start-->
<div class="center">
    <form method="post" class="centerForm" action = "/authentification">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse e-mail :</label>
            <input required type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Ne partagez pas votre email avec un tier.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe :</label>
            <input required type="password" class="form-control" name="password" id="exampleInputPassword1">
            <div id="passwordHelp" class="form-text">Ne partagez jamais votre mot de passe.</div>
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
