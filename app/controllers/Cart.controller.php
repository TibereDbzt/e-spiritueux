<?php

session_start();

class CartController {

    public static function setCart($cart = NULL) {
        if (!isset($cart)) $_SESSION['cart'] = array();
        else $_SESSION['cart'] = $cart;
    }

    public static function getCart() {
        if (!isset($_SESSION['cart'])) self::setCart();
        return $_SESSION['cart'];
    }

    public static function addToCart($item) {
        $cart = self::getCart();
        array_push($cart, $item);
        self::setCart($cart);
    }

    public static function removeFromCart($productID) {
        $cart = self::getCart();
        $cart = array_filter($cart, function($item) use($productID) {
            return $item['productID'] != $productID;
        });
        self::setCart($cart);
    }

    public static function getAllItems() {
        $cart = self::getCart();
        if (sizeof($cart) == 0) return false;
        $items = array();
        foreach ($cart as $item) {
            array_push($items, array(
                'product' => ProductModel::getProductById(intval($item['productID'])),
                'quantity' => intval($item['quantity'])
            ));
        }
        return $items;
    }

    public static function getNbOfProducts() {
        return sizeof(self::getCart());
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

    public static function getItemByProductID($productID) {
        $cart = self::getCart();
        if (sizeof($cart) == 0) return false;
        if (empty($cart)) return false;
        foreach ($cart as $item) {
            if ($item['productID'] == $productID) return $item;
        }
        return false;
    }

    public static function addQuantity($productID, $quantity) {
        $cart = array_map(function ($item) use ($productID, $quantity) {
            if ($item['productID'] == $productID) {
                $item['quantity'] = $item['quantity'] + $quantity;
            }
            return $item;
        }, self::getCart());
        self::setCart($cart);
    }
    
}

?>