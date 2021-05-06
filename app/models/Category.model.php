<?php

require_once MODEL_PATH . 'Model.php';

class CategoryModel {

    private $categoryID;
    private $categoryName;

    public function __construct(int $id = NULL, string $name = NULL) {
        if (!is_null($id) && !is_null($name)) {
            $this->categoryID = $id;
            $this->categoryName = $name;
        }
    }

    public static function getAllCategories() {
        $request = Model::$pdo->query('SELECT * FROM categories');
        $request->setFetchMode(PDO::FETCH_CLASS, 'CategoryModel');
        $categories = $request->fetchAll();
        if (empty($categories)) return false;
        return $categories;
    }
    
    public static function getCategoryById($id) {
        $request = Model::$pdo->prepare('SELECT * FROM categories WHERE categoryID = :id');
        $values = array(
            'id' => $id
        );
        $request->execute($values);
        $request->setFetchMode(PDO::FETCH_CLASS, 'CategoryModel');
        $categories = $request->fetchAll();
        if (empty($request)) return false;
        return $categories[0];
    }

    public function getCategoryId() {
        return $this->categoryID;
    }

    public function getCategoryName() {
        return $this->categoryName;
    }
    
}

?>