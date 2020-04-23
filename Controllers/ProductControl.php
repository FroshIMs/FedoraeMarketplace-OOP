<?php
  class ProductControl extends Controller {

    public function acceptDisplayProducts() {
      $obj = new ProductModel();
      return $obj->getDisplayProducts();
    }

    public function acceptProducts($id) {
      $obj = new ProductModel();
      return $obj->getProducts($id);
    }

    public function acceptProductReviews($id) {
      $obj = new ProductModel();
      return $obj->getProductReviews($id);
    }

    public function acceptGetReview() {
      $obj = new ProductModel();
      return $obj->getReview();
    }

  }
