<?php
  class StoreControl extends Controller {

    public function acceptSellerProducts($id) {
      $obj = new StoreModel();
      return $obj->getSellerProducts($id);
    }

    public function acceptStore($id) {
      $obj = new storeModel();
      return $obj->getStore($id);
    }

  }
