<?php

    require_once './../app/app.php';
    
    require_once CTRL_PATH . 'Cart.controller.php';
    
    $productID = $_POST['productID'];
    $quantity = (int)$_POST['quantity'];

    $matchingCartItem = CartController::getItemByProductID($productID);

    if (!$matchingCartItem) CartController::addToCart(array('productID' => $productID, 'quantity' => $quantity));
    else CartController::addQuantity($productID, $quantity);

    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");

?>