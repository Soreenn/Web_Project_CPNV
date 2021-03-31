<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
ob_start();
$title = "Panier";
?>
    <html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <h2>Votre panier</h2>
    <br>
    <?php foreach ($data as $info) : ?>
        <?php if ($info['email'] == $_SESSION['email']) : ?>
            <?php $info['ownerEmail'] = htmlentities($info['ownerEmail']); ?>
            <?php $info['title'] = htmlentities($info['title']); ?>
            <?php $info['price'] = htmlentities($info['price']); ?>
            <?php $info['date'] = htmlentities($info['date']); ?>
            <div class="col-lg-auto">
                <div class="table-responsive">
                    <table class="tableCart center table textcolor">
                        <tbody>
                        <tr>
                            <th>Produit</th>
                            <th>Vendeur</th>
                            <th>Prix</th>
                            <th>Date</th>
                        </tr>
                        <tr>
                            <td><?= $info['title'] ?></td>
                            <td><?= $info['ownerEmail'] ?></td>
                            <td><?= $info['price'] ?></td>
                            <td><?= $info['date'] ?></td>
                            <td>
                                <form method="post" action="/cart/del/">
                                    <input type="hidden" name="date" value="<?=$info['date']?>">
                                    <button class="btn btn-secondary col-lg-12 col-md-12 col-12" type="submit">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <br>
    <br>
    <form method="post" action="/cart/checkout/">
        <button class="btn btn-secondary col-lg-12 col-md-12 col-12" type="submit">Procéder au paiment</button>
    </form>
    </body>
    </html>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>