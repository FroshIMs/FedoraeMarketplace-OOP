<?php
class Hash {
  public static function make($password) {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public static function salt($length) {
    return password_hash($length, PASSWORD_DEFAULT);
  }

  public static function unique() {
    return self::make(uniqid());
  }
}
