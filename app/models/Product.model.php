<?php

require_once MODEL_PATH . 'Model.php';

class WineModel {

    public static function getAllProducts() {
        $request = Model::$pdo->query('SELECT * FROM products');
        // $request->setFetchMode(PDO::FETCH_ASSOC, )
        $products = $request->fetchAll();
        return $products;
    }

}

?>