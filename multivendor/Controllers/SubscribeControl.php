<?php
class SubscribeControl extends controller {

  private static $_email;

  public static function subscribe() {
    if (isset($_POST['subscrip'])) {
      self::$_email = $_POST['sub-email'];

      $query = "INSERT INTO subscriptions (email) VALUES (?)";

      $stmt = Database::connect()->prepare($query);
      $stmt->execute([self::$_email]);

      echo "<script>alert('You have successfully subscribed!')</script>";
    }
  }
}
