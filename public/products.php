<?php

require_once './../app/app.php';

getDebug();

require MODEL_PATH . 'Product.model.php';
require MODEL_PATH . 'Category.model.php';

$products = ProductModel::getAllProducts();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- load bootstrap styles -->
    <!-- load a reset file to standardize browsers -->
    <link rel="stylesheet" href="./styles/reset.css">
    <!-- generic styles -->
    <link rel="stylesheet" href="./styles/global.css">
    <!-- specific styles -->
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/products.css">
    <title>WineShop</title>
</head>
<body>

    <?php
        require_once './header.php';
    ?>

    <div class="wrapper">

        <main class="content">

            <header class="header">
                <h2 class="header__title">découvrez tous nos produits</h2>
                <div class="header__separator">
                    <span class="line"></span>
                    <span class="circle"></span>
                </div>
                <p class="header__description">Tous nos produits sont certifiés cuite assurée  et sont le fruit d’une sélection dans les quatre coins du monde des mielleures fermes agricoles.</p>
            </header>

            <div class="products">
                <?php
                    
                    foreach ($products as $product) {
                        echo '<a class="product link-target" href="./details.php?id=' . $product->getId() . '">';
                            echo '<div class="product__thumbnail"><img src="./assets/images/products/' . $product->getImageName() . '.png" alt =""></div>';
                            echo '<div class="product__infos">';
                                echo '<h3 class="product__name">' . $product->getName() . '</h3>';
                                echo '<div class="product__details-container">';
                                    echo '<div class="product__detail">' . $product->getCategoryName() . '</div>';
                                    echo '<span class="keyword-separator"></span>';
                                    echo '<div class="product__detail">' . $product->getOrigin() . '</div>';
                                    echo '<span class="keyword-separator"></span>';
                                    echo '<div class="product__detail">' . $product->getVolume() . 'cl</div>';
                                    echo '<span class="keyword-separator"></span>';
                                    echo '<div class="product__detail">' . $product->getAlcoholLevel() . '%vol</div>';
                                    echo '<div class="product__price">' . $product->getPrice() . '€</div>';
                                echo '</div>';
                                echo '<div class="product__button-container">';
                                    echo '<div class="button">';
                                        echo '<span class="button__arrow"></span>';
                                        echo '<span class="button__text">détails</span>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</a>';
                    }
                
                ?>
            </div>
        </main>

    </div>

</body>
</html>