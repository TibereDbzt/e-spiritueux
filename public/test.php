<?php
    require_once './../app/app.php';

    require_once MODEL_PATH . 'Product.model.php';

    getDebug();

    var_dump(ProductModel::getProductById(1));
?>