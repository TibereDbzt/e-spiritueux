<?php
    require_once './../app/app.php';

    require_once MODEL_PATH . 'Category.model.php';

    getDebug();

    var_dump(CategoryModel::getAllCategories());
?>