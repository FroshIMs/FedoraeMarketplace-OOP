<?php
class Redirect {
  public static function to($location = null) {
    if($location) {
      if (is_numeric) {
        switch($location) {
          case 404:
            header('HTTP/1.0 404 Not Found');
            include 'Views/errors/404.php';
          break;
        }
      }
      header('Location: ' . $location);
      exit();
    }
  }
}
