<?php
  class sellersControl extends Controller {

    public function acceptDisplaySellers() {
      $obj = new sellersModel();
      return $obj->getDisplaySellers();
    }

    public function acceptSellers($id) {
      $obj = new sellersModel();
      return $obj->getSellers($id);
    }

    public function acceptMonthSellers() {
      $obj = new sellersModel();
      return $obj->getMonthSellers();
    }
  }
