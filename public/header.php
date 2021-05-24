<!--
    header.php
    entête de tous les pages
    @author équipe e-spiritueux
    @date 13/05/2021
-->

<?php

require_once './../app/app.php';

require_once CTRL_PATH . 'Cart.controller.php';

$nbOfProducts = CartController::getNbOfProducts();

?>

<header class="page-header">
    <div class="wrapper">
        <nav class="nav">
            <div class="logo__container">
                <a href="./index.php">
                    <img src="./assets/images/logo_black.png" alt="logo of e-spiritueux" class="logo__img">
                </a>
            </div>
            <ul class="nav__list">
                <li class="nav__entry">
                    <a class="nav__link" href="./index.php">accueil</a>
                </li>
                <li class="nav__entry">
                    <a class="nav__link" href="./products.php">produits</a>
                </li>
                <li class="nav__entry">
                    <a class="nav__link" href="./cart.php">panier
                    <span class="cart__nbOfProducts "><?php echo $nbOfProducts ?></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>