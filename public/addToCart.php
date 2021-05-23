<?php

    require_once './../app/app.php';
    
    require_once CTRL_PATH . 'Cart.controller.php';

    getDebug();
    
    $productID = $_POST['productID'];
    $quantity = (int)$_POST['quantity'];

    $matchingCartItem = CartController::getItemByProductID($productID);

    // var_dump($matchingCartItem);

    // if ($matchingCartItem) CartController::addQuantity($productID, $quantity);
    // else CartController::addToCart(array('productID' => $productID, 'quantity' => $quantity));

    if (!$matchingCartItem) CartController::addToCart(array('productID' => $productID, 'quantity' => $quantity));
    else CartController::addQuantity($productID, $quantity);

    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");

?>