<?php

class Database {
    
    static private $debug = True;

    static public function getDebug() {
        return self::$debug;
    }

    static public function getHostname() {
        return parse_ini_file('env.ini', true)['db']['host'];
    }

    static public function getDatabase() {
        return parse_ini_file('env.ini', true)['db']['database'];
    }

    static public function getLogin() {
        return parse_ini_file('env.ini', true)['db']['login'];
    }

    static public function getPassword() {
        return parse_ini_file('env.ini', true)['db']['password'];
    }
    
}

?>