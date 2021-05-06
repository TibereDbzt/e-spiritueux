<!-- A LAISSER DE CÔTÉ POUR LE MOMENT, TRAVAILLER DIRECTEMENT AVEC LES CLASSES MODÈLES -->

<?php

require_once MODEL_PATH . '/Car.model.php';

class CarController {
    
    public static function readAll() {
        $cars = CarModel::getAllCars();
        require VIEW_PATH . '/car/list.view.php';
    }

    public static function readOne() {
        $immat = $_GET['immat'];
        $car = CarModel::getCarByImmat($immat);
        if (!$car) {
            require VIEW_PATH . '/car/error.view.php';
        }
        else {
            require VIEW_PATH . '/car/detail.view.php';
        }
    }

    public static function create() {
        require VIEW_PATH . '/car/create.view.php';
    }

    public static function created() {
        getDebug();
        $immat = $_POST['immatriculation'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $color = $_POST['color'];
        $car = new CarModel($immat, $brand, $model, $color);
        if (!$car->save()) {
            require VIEW_PATH . '/car/error.view.php';
        }
        else {
            self::readAll();
        }
    }
    
}

?>