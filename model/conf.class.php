<?php

class Conf {

    private static $database = array(
        'hostname' => 'localhost',
        'database' => 'mediastore',
        'login' => 'root',
        'password' => ''
    );

    public static function getHostName() {
        return self::$database['hostname'];
    }
    public static function getDataBase() {
        return self::$database['database'];
    }
    public static function getLogin() {
        return self::$database['login'];
    }
    public static function getPassword() {
        return self::$database['password'];
    }

}


