<?php

session_start();

class CartController {

    public static function setCart() {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
    }

    public static function addToCart($item) {
        self::setCart();
        array_push($_SESSION['cart'], $item);
    }

    public static function getCart() {
        return $_SESSION['cart'];
    }

    public static function getAllItems() {
        $cart = self::getCart();
        if (empty($cart)) return false;
        $items = array();
        foreach ($cart as $item) {
            array_push($items, array(
                'product' => ProductModel::getProductById(intval($item['productID'])),
                'quantity' => intval($item['quantity'])
            ));
        }
        return $items;
    }

    public static function getTotalPrice($listProductQuantity) {
        $totalPrice = 0;
        foreach ($listProductQuantity as $item) {
            $totalPrice += $item['product']->getPrice() * $item['quantity'];
        }
        return $totalPrice;
    }

    public static function getTotalQuantity($listProductQuantity) {
        $totalQuantity = 0;
        foreach ($listProductQuantity as $item) {
            $totalQuantity += $item['quantity'];
        }
        return $totalQuantity;
    }
    
}

?>