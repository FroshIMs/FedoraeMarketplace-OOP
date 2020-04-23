<?php
class AddProductModel extends DashModel {

  public $productName, $sku, $price, $quantity, $description, $availability, $status, $user_id;

  public function addProduct() {

    if(isset($_POST['save'])){

      $this->name = $_POST['product-name'];
      $this->sku = $_POST['sku'];
      $this->price = $_POST['price'];
      $this->quantity = $_POST['quantity'];
      $this->description = $_POST['product-description'];
      $this->availability = $_POST['availability'];
      $this->status = $_POST['status'];
      $this->user_id = $_SESSION['id'];

      $addProduct = "INSERT INTO products (name, sku, price, quantity, description, availability, status, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = Database::connect()->prepare($addProduct);
      $stmt->execute([$this->name, $this->sku, $this->price, $this->quantity, $this->description, $this->availability, $this->status, $this->user_id]);

      if ($stmt) {
        header('Location: products');
      } else {
        echo "<script>alert('Product was not added successfully.</script>')";
      }


      }
    }

}
