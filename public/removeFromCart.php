<?php

    require_once './../app/app.php';

    require_once CTRL_PATH . 'Cart.controller.php';

    getDebug();
    
    $productID = $_POST['productID'];

    CartController::removeFromCart($productID);

    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");

?>