<!-- classe modèle représentant une entité dans la base de données -->
<!-- PRENDRE EXEMPLE ICI POUR CONSTRUIRE WINE.MODEL.PHP -->

<?php

require_once MODEL_PATH . 'Model.php';

class CarModel {

	private $immatriculation;
	private $brand;
	private $model;
	private $color;

	public function __construct(string $immat = NULL, string $brand = NULL, string $model = NULL, string $color = NULL) {
		if (!is_null($immat) && !is_null($brand) && !is_null($model) && !is_null($color)) {
			$this->immatriculation = $immat;
			$this->brand = $brand;
			$this->model = $model;
			$this->color = $color;
		}
	}

	public static function getCarByImmat($immat) {
		$request = Model::$pdo->prepare("SELECT * FROM Cars WHERE immatriculation = :immat");
		$values = array(
			'immat' => $immat
		);
		$request->execute($values);
		$request->setFetchMode(PDO::FETCH_CLASS, 'CarModel');
		$cars = $request->fetchAll();
		if (empty($cars)) return false;
		return $cars[0];
	}

	public static function getAllCars() {
		$request = Model::$pdo->query('SELECT * FROM Cars');
		$request->setFetchMode(PDO::FETCH_CLASS, 'CarModel');
		return $request->fetchAll();
	}

	public function save() {
		try {
			$request = Model::$pdo->prepare("INSERT INTO Cars (immatriculation, brand, model, color) VALUES (
				:immat, :brand, :model, :color)");
			$values = array(
				'immat' => $this->immatriculation,
				'brand' => $this->brand,
				'model' => $this->model,
				'color' => $this->color
			);
			$request->execute($values);
		} catch (PDOException $e) {
			if ($e->getCode() == '23000') return false;
		}
	}

	public function getImmatriculation() {
		return $this->immatriculation;
	}

	public function getBrand() {
		return $this->brand;
	}

	public function getmodel() {
		return $this->model;
	}

	public function getColor() {
		return $this->color;
	}

	public function setBrand(string $brand) {
		$this->brand = $brand;
	}

}

?>