<?php
  class ProductModel extends Model {

    public $errors = array();

    private function displayProducts() {
      $sql = "SELECT * FROM products";
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getDisplayProducts() {
      return $this->displayProducts();
    }

    private function products($id) {
      $sql = "SELECT * FROM products WHERE id=".$id;
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getProducts($id) {
      return $this->products($id);
    }

    private function productReviews($id) {
      $sql = "SELECT * FROM reviews WHERE product_id=".$id;
      $stmt = $this->connect()->query($sql);
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $row;
    }

    public function getProductReviews($id) {
      return $this->productReviews($id);
    }

    private function addReview() {
      // if user clicks on the sign up button
          if (isset($_POST['add-review'])) {
            $author       = htmlentities($_POST['author']);
            $title        = htmlentities($_POST['title']);
            $description  = htmlentities($_POST['description']);
            $rating       = htmlentities($_POST['rating']);
            $product_id   = htmlentities($_POST['product_id']);

        // validation - should probably make a validation class

          if (empty($author)) {
              $this->errors['author'] = "Author required";
          }
          if (empty($title)) {
            $this->errors['title'] = "Title required";
          }
          if (empty($description)) {
              $this->errors['description'] = "Description required";
          }
          if (empty($rating)) {
              $this->errors['rating'] = "Rating required";
          }

          if (count($this->errors) === 0) {

            $addReview = "INSERT INTO reviews (author, title, description, rating, product_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = Database::connect()->prepare($addReview);

            if ($stmt->execute([$author, $title, $description, $rating, $product_id])) {

              // probably should make a redirect function
              # wait dont I already, probably should use it then!
              header('Location: /fedorae/product?product_id='.$product_id);
              exit();
            } else {
                $errors['db_error'] = "Database error: failed to add review.";
            }
          }
        }
      }

      public function getReview() {
        return $this->addReview();
      }

    }
