<?php
/**
 * Author : Luke CORNAZ & Gabriel PEREIRA
 * Date : 12.02.2021
 * Version : 0.1
 */
header_remove();
ob_start();
$title = "Paiement";
foreach ($data as $info) {
    if ($info['email'] == $_SESSION['email']) {
        $total = (int)$total + (int)$info['price'];
        $nb = (int)$nb + 1;

    }
}
?>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

        <!-- Custom styles for this template -->
        <link href="form-validation.css" rel="stylesheet">
    </head>
    <body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Votre panier</span>
                            <span class="badge bg-primary rounded-pill"><?= $nb ?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php foreach ($data as $info) : ?>
                                <?php if ($info['email'] == $_SESSION['email']) : ?>
                                    <?php $info['ownerEmail'] = htmlentities($info['ownerEmail']); ?>
                                    <?php $info['title'] = htmlentities($info['title']); ?>
                                    <?php $info['price'] = htmlentities($info['price']); ?>
                                    <?php $info['date'] = htmlentities($info['date']); ?>
                                    <li class="list-group-item justify-content-between lh-sm">
                                        <div>
                                            <h6 class="my-0"><?= $info['title'] ?>Product name</h6>
                                            <small class="text-muted"><?= $info['desc'] ?></small>
                                        </div>
                                        <span class="text-muted"><?= $info['price'] ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (CHF)</span>
                                <strong><?= $total ?></strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Adresse de paiement</h4>
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Addresse</label>
                                    <input type="text" class="form-control" id="address" placeholder="12 Rue du lorier"
                                           required>
                                </div>
                                <div class="col-12">
                                    <label for="address2" class="form-label">Addresse 2<span class="text-muted"> (Optionnel)</span></label>
                                    <input type="text" class="form-control" id="address2"
                                           placeholder="Appartement ou suite">
                                </div>
                                <div class="col-md-5">
                                    <label for="country" class="form-label">Pays</label>
                                    <select class="form-select" id="country" required>
                                        <option value="">Choix</option>
                                        <option>United States</option>
                                        <option>Switzerland</option>
                                        <option>Italy</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">Province</label>
                                    <select class="form-select" id="state" required>
                                        <option value="">Choix</option>
                                        <option>California</option>
                                        <option>Vaud</option>
                                        <option>Abruzzo</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Code Postal</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" required>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="same-address">
                                <label class="form-check-label" for="same-address">L'adresse de paiement est la même que
                                    de livraison</label>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Paiement</h4>

                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label for="cc-name" class="form-label">Nom sur la carte</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Nom complet tel qu'affiché sur la carte</small>
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Numéros de la carte</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="cc-expiration" class="form-label">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                </div>

                                <div class="col-md-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="currentColor"
                                         viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                                    </svg>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">Procéder au paiment</button>
                        </form>
                    </div>
                </div>
        </main>
    </body>
    </html>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>