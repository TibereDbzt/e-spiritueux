<?php

require_once MODEL_PATH . 'Model.php';

class ProductModel {

    private $productID;
	private $productName;
	private $categoryID;
	private $productOrigin;
	private $productPrice;
	private $productVolume;
	private $productAlcoholLevel;
	private $productDescription;
	private $productImageName;

    public function __construct(int $id = NULL, string $name = NULL, int $categoryID = NULL, string $origin = NULL, float $price = NULL, int $volume = NULL, int $alcoholLevel = NULL, string $description = NULL, string $imageName = NULL) {
        if (!is_null($id) && !is_null($name) && !is_null($categoryID) && !is_null($origin) && !is_null($price) && !is_null($volume) && !is_null($alcoholLevel) && !is_null($description) && !is_null($imageName)) {
			$this->productID = $id;
			$this->productName = $name;
			$this->categoryID = $categoryID;
			$this->productOrigin = $origin;
			$this->productPrice = $price;
			$this->productVolume = $volume;
			$this->productAlcoholLevel = $alcoholLevel;
			$this->productDescription = $description;
			$this->productImageName = $imageName;
		}
    }

    public static function getAllProducts() {
        $request = Model::$pdo->query('SELECT * FROM products');
        $request->setFetchMode(PDO::FETCH_CLASS, 'ProductModel');
        $products = $request->fetchAll();
        return $products;
    }

    public static function getProductById($id) {
        $request = Model::$pdo->prepare("SELECT * FROM products WHERE productID = :id");
        $values = array(
            'id' => $id
        );
        $request->execute($values);
        $request->setFetchMode(PDO::FETCH_CLASS, 'ProductModel');
        $products = $request->fetchAll();
        if (empty($products)) return false;
        return $products[0];
    }

    public function getId() {
        return $this->productID;
    }

    public function getName() {
        return $this->productName;
    }

    public function getCategoryId() {
        return $this->categoryID;
    }

    public function getCategoryName() {
        return CategoryModel::getCategoryById($this->getCategoryId())->getCategoryName();
    }

    public function getOrigin() {
        return $this->productOrigin;
    }

    public function getPrice() {
        return $this->productPrice;
    }

    public function getVolume() {
        return $this->productVolume;
    }

    public function getAlcoholLevel() {
        return $this->productAlcoholLevel;
    }

    public function getDescription() {
        return $this->productDescription;
    }

    public function getShortDescription() {
        return substr($this->productDescription, 0, 130) . '...';
    }

    public function getImageName() {
        return $this->productImageName;
    }

}

?>