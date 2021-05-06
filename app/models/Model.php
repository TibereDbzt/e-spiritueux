<!-- static class to be used to connect to the database -->

<?php

require(CONF_PATH . 'Database.php');

class Model {

    static public $pdo;

    static public function Init() {
        $hostname = Database::getHostname();
        $database = Database::getDatabase();
        $login = Database::getLogin();
        $password = Database::getPassword();
        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database", $login, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Database::getDebug()) {
                echo $e->getMessage();
            } else {
                echo 'Une erreur est survenue, <a href="' . $_SERVER['DOCUMENT_ROOT'] . 'covoit/EcoloCar/index.php">retour à la page d\'accueil</a>';
            }
            die();
        }
    }
    
}

Model::Init();

?>