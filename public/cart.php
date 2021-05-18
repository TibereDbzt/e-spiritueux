<!--
    cart.php
    ajouter description
    @author équipe e-spiritueux
    @date 14/05/2021
-->
<?php

    require_once './../app/app.php';

    getDebug();

    require_once MODEL_PATH . 'Product.model.php';
    require_once CTRL_PATH . 'Cart.controller.php';

    $items = CartController::getAllItems();
    $totalPrice = CartController::getTotalPrice($items);
    $totalQuantity = CartController::getTotalQuantity($items);
    $msgEmptyCart = 'Votre panier est vide';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- load a reset file to standardize browsers -->
    <link rel="stylesheet" href="./styles/reset.css">
    <!-- generic styles -->
    <link rel="stylesheet" href="./styles/global.css">
    <!-- specific styles -->
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/cart.css">
    <title>WineShop</title>
</head>
<body>

    <?php
        require_once './header.php';
    ?>

    <div class="wrapper">

        <main class="content">
            <h2 class="section__title">votre panier</h2>

            <?php

                if (!$items) echo $msgEmptyCart;
                else {
                    foreach ($items as $item) {
                        echo '<div class="cart-item">';
                        echo '<div class="cart-item__thumbnail"><img src="./assets/images/products/' . $item['product']->getImageName() . '.png" alt=""></div>';
                        echo '<div class="cart-item__text"><h4 class="cart-item__name">'. $item['product']->getName() . '</h4>';
                        echo '<p class="cart-item__desc">' . $item['product']->getShortDescription() . '</p></div>';
                        echo '<div class="cart-item__data"><div class="cart-item__price">' . $item['product']->getPrice() .'€</div>';
                        echo '<div class="cart-item__quantity">x' . $item['quantity'] . '</div></div></div>';
                    }
                }

            ?>

            <div class="cart-resume">
                <p class="cart-resume__nbOfProducts">Votre panier contient <?php echo $totalQuantity ?> produits</p>
                <p class="cart-resume__price">Pour un total de <?php echo $totalPrice ?>€</p>
                <a href="#" class="btn btn-submit">Passer votre commande</a>
            </div>

        </main>

    </div>
</body>
</html>