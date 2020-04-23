<?php
class ProducerModel extends DashModel {

  private static $_user_type = 3;

  public static function displayProducers() {
    $sql = "SELECT * FROM users WHERE user_type=".self::$_user_type;
    $stmt = Database::connect()->query($sql);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

}
