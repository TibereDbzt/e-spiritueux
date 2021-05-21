<?php

    require_once './../app/app.php';
    
    require_once CTRL_PATH . 'Cart.controller.php';

    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    $cart_item = array('productID' => $productID, 'quantity' => $quantity);

    CartController::addToCart($cart_item);

    var_dump($_SESSION['cart']);

    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");

?>