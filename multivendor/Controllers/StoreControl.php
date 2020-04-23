<?php
  class StoreControl extends Controller {

    public function acceptSellerProducts($id) {
      $obj = new StoreModel();
      return $obj->getSellerProducts($id);
    }

  }
