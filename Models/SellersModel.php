<?php
// fix the seller display not showing
  class SellersModel extends Model {

    private function displaySellers() {
      $sql = "SELECT * FROM users";
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getDisplaySellers() {
      return $this->displaySellers();
    }

    // put in own class
    private function sellers($id) {
      $sql = "SELECT * FROM users WHERE id={$id} LIMIT 1";
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getSellers($id) {
      return $this->sellers($id);
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
