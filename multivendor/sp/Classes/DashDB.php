<?php
  /**
   *
   */
  class DashBD {

    private static $_instance = null;
    private $_query,
            $_error = false,
            $_results,
            $_count = 0;

    public static $host = "127.0.0.1";
    public static $dbName = "fedorae";
    public static $username = "root";
    public static $password = "";

    //was private
    public static function connect() {
      $conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$username, self::$password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    }

    public static function query($query, $params= array()) {
      $statement = self::connect()->prepare($query);
      $statement->execute($params);

      if (explode(' ', $query)[0] == 'SELECT') {
        $data = $statement->fetchAll();
        return $data;
      }
    }

    // // may not even use this
    // public static function getInstance() {
    //   if(!isset(self::$_instance)) {
    //     self::$_instance = new Database();
    //   }
    //   return self::$_instance;
    // }
    //
    // private function action($action, $table, $where = array()) {
    //   if(count($where) === 3) {
    //     $operators = array('=', '>', '<', '>=', '<=');
    //
    //     $field = $where[0];
    //     $operator = $where[1];
    //     $value = $where[2];
    //
    //     if (in_array($operator, $operators)) {
    //       $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
    //
    //       if (!$this->query($sql, array($value))->error()) {
    //         return $this;
    //       }
    //     }
    //   }
    //   return false;
    // }
    //
    // public function get($table, $where) {
    //   return $this->action('SELECT *', $table, $where);
    // }
    //
    // public function delete($table, $where) {
    //   return $this->action('DELETE', $table, $where);
    // }
    //
    // public function insert($table, $fields = array()) {
    //   if(count($fields)) {
    //     $keys = array_keys($fields);
    //     $values = '';
    //     $x = 1;
    //
    //     foreach ($fields as $field) {
    //       $values .= '?';
    //       if($x < count($fields)) {
    //         $values .= ', ';
    //       }
    //       $x++;
    //     }
    //
    //     $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
    //
    //     if (!$this->query($sql, $fields)->error()) {
    //       return true;
    //     }
    //   }
    //   return false;
    // }
    //
    // public function update($table, $id, $fields) {
    //   $set = '';
    //   $x = 1;
    //
    //   foreach ($fields as $name => $value) {
    //     $set .= "{$name} = ?";
    //     if($x < count($fields)) {
    //       $set .= ', ';
    //     }
    //     $x++;
    //   }
    //   $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
    //
    //   if (!$this->query($sql, $fields)->error()) {
    //     return true;
    //   }
    //   return false;
    // }
    //
    // public function results() {
    //   return $this->_results;
    // }
    //
    // public function first() {
    //   return $this->results()[0];
    // }
    //
    // public function error() {
    //   return $this->_error;
    // }
    //
    // public function count() {
    //   return $this->_count;
    // }
  }
