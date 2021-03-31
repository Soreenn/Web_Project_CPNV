<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 10.03.2021
 * Version : 0.1
 */
ob_start();
$title = "Profile";
?>

<?php foreach ($data as $info) : ?>
    <?php if ($info['email'] == $profile['ownerEmail']) : ?>

        <?php
        if (substr_count($info['email'], ".") > 1) {
        $name = strtok($info['email'], '.');
        } elseif (substr_count($info['email'], ".") < 2) {
        $name = strtok($info['email'], '@');
        } elseif (substr_count($info['email'], "-") > 0) {
        $name = strtok($info['email'], '-');
        }

        $info['bio'] = htmlentities($info['bio']);
        $name = htmlentities($name);
        ?>

        <div class="center">
            <div>
                <h2>Profile <?= $name ?> !</h2>
            </div>
            <br>
            <div>
                <img src="/<?= $info['pdp'] ?>" class="rounded-circle" style="width: 300px; height: 300px">
            </div>
            <br>
            <br>
        </div>
        <!--Form start-->
        <div class="center">
            <form>
                <textarea style="resize: none" class="form-control" name="ameliorer" id="ameliorer" rows="7" cols="100"><?= $info['bio'] ?></textarea>
            </form>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
    <!--Form end-->

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>