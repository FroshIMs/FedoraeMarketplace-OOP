<?php
  class SellerModel extends Model {

    private function displaySellers() {
      $sql = "SELECT * FROM users WHERE user_type = 2";
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getDisplaySellers() {
      return $this->displaySellers();
    }

    // put in own class
    private function seller($id) {
      $sql = "SELECT * FROM users WHERE id=".$id;
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getSeller($id) {
      return $this->seller($id);
    }

    private function monthSellers() {
      $sql = "SELECT * FROM users LIMIT 3";
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getMonthSellers() {
      return $this->monthSellers();
    }
  }
