<?php

class database {
    private static $dsn = 'mysql:host=localhost;dbname=emsdata';
    private static $dbusername = 'root';
    private static $password = '';
    private static $db;


    private function _construct() {}

  public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$dbusername,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                throw $e;
                exit();
            }
        }
        return self::$db;
    }
}