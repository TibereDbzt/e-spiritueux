<?php
    require_once './../app/app.php';

    require_once MODEL_PATH . 'Product.model.php';
    require_once MODEL_PATH . 'Category.model.php';

    $product = ProductModel::getProductById(3);
    $category = CategoryModel::getCategoryById($product->getCategoryId());
    var_dump($category);
?>