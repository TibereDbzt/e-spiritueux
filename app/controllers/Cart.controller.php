<?php

class CartController {

    public static function setCart() {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
    }

    public static function addToCart($item) {
        self::setCart();
        array_push($_SESSION['cart'], $item);
    }
    
}

?>