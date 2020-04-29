<?php
  class StoreModel extends Model {

    private function sellerProducts($id) {
      $sql = "SELECT * FROM products WHERE user_id=".$id;
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getSellerProducts($id) {
      return $this->sellerProducts($id);
    }

    private function setStore($id) {
      $sql = "SELECT * FROM stores WHERE user_id=".$id;
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getStore($id) {
      return $this->setStore($id);
    }

  }
