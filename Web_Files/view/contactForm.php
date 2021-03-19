<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Contact";
?>
<?php foreach ($data as $info) : ?>
    <?php if ($info['email'] == $ownerEmail['ownerEmail']) : ?>

    <?php if (substr_count($info['email'], ".") > 1) {
            $name = strtok($info['email'], '.');
        } elseif (substr_count($info['email'], ".") < 2) {
            $name = strtok($info['email'], '@');
        } elseif (substr_count($info['email'], "-") > 0) {
            $name = strtok($info['email'], '-');
        } ?>

        <div>
            <div>
                <h1 class="display-10">Contactez <span
                            style="text-transform: capitalize"><?= $name ?></span></h1>
            </div>
            <br>
            <div class="center">
                <img src="/<?= $info['pdp'] ?>" class="rounded-circle" style="width: 200px; height: 200px">
            </div>
            <hr>
            <br>
            <div class="center">
                <form method="post" class="centerForm was-validated">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Adresse e-mail :</label>
                        <input required type="email" class="form-control" name="email" id="exampleInputEmail1">
                        <div id="emailHelp" class="form-text">Ne partagez pas votre email avec un tier.</div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Sujet :</label>
                        <input required type="text" class="form-control" name="subject" id="subject">
                        <div id="emailHelp" class="form-text">Notifiez le sujet du message.</div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Message :</label>
                        <textarea required class="form-control" name="content" id="content"></textarea>
                        <div id="emailHelp" class="form-text">Ecrivez votre message destiné à l'annonceur</div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Envoyer le message à l'annonceur</button>
                    <br>
                </form>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>