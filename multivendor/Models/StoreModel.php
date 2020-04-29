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

  }
