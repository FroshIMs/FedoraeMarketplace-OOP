<?php
class UserModel {
  public static function getuser($id) {
    $query = Database::connect()->prepare('SELECT * FROM users WHERE id = :id');
    $query->execute(array(':id' => $id));
    $user = $query->fetchAll(PDO::FETCH_ASSOC);
    return $user;
  }

  public function users() {
    $query = Database::connect()->prepare('SELECT * FROM users');
    $query->execute();
    $user = $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
