<?php
  class sellerControl extends Controller {

    public function acceptDisplaySellers() {
      $obj = new sellerModel();
      return $obj->getDisplaySellers();
    }

    public function acceptMonthSellers() {
      $obj = new sellerModel();
      return $obj->getMonthSellers();
    }

    public function acceptGetSeller($id) {
      $obj = new sellerModel();
      return $obj->getSeller($id);
    }

  }
