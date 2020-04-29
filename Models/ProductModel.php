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

      // add to Cart
      public static function addToCart() {
        $product_ids = array();
        if (isset($_POST['add-to-cart'])) {
          if (isset($_SESSION['shopping_cart'])) {
            $count = count($_SESSION['shopping_cart']);

            $product_ids = array_column($_SESSION['shopping_cart'], 'id');

            if (!in_array($_POST['productId'], $product_ids)) {
              $_SESSION['shopping_cart'][$count] = array(
                'id' => htmlentities($_POST['productId']),
                'name' => htmlentities($_POST['productName']),
                'price' => htmlentities($_POST['productPrice']),
                'quantity' => htmlentities($_POST['productQuantity'])
              );
            } else {
              for ($i=0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == $_POST['productId']) {
                  $_SESSION['shopping_cart'][$i]['quantity'] += $_POST['productQuantity'];
                }
              }
            }
          } else {
            $_SESSION['shopping_cart'][0] = array(
              'id' => htmlentities($_POST['productId']),
              'name' => htmlentities($_POST['productName']),
              'price' => htmlentities($_POST['productPrice']),
              'quantity' => htmlentities($_POST['productQuantity'])
            );
          }
        }
      }

      public static function removeFromCart() {
        if (isset($_GET['action'])) {
          foreach ($_SESSION['shopping_cart'] as $key => $product) {
            if ($product['id'] == $_GET['id']) {
              unset($_SESSION['shopping_cart'][$key]);
            }
          }
        }
        $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
      }

    }
