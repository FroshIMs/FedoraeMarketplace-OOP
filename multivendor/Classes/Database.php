<?php
  class Database {

    public static $host = "127.0.0.1";
    public static $dbName = "fedorae";
    public static $username = "root";
    public static $password = "";
    public static $_instance;

    // probably should be private
    public static function connect() {
      $conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$username, self::$password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    }

    // may not even use this
    public static function getInstance() {
      if(!isset(self::$_instance)) {
        self::$_instance = new Database();
      }
      return self::$_instance;
    }

    public static function query($query, $params= array()) {
      $statement = self::connect()->prepare($query);
      $statement->execute($params);

      if (explode(' ', $query)[0] == 'SELECT') {
        $data = $statement->fetchAll();
        return $data;
      }
    }
  }
