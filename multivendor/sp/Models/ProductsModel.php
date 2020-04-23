<?php
class ProductsModel extends DashModel {

  public $productName, $sku, $price, $quantity, $description, $availability, $status, $id;

  public static function displayProducts($user_id) {
    $sql = "SELECT * FROM products WHERE user_id=".$user_id;
    $stmt = Database::connect()->query($sql);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  // public function getDisplayProducts() {
  //   return $this->displayProducts();
  // }

  public static function products() {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=".$id;
    $stmt = Database::connect()->query($sql);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
  }

  // public function getProducts($id) {
  //   return $this->products($id);
  // }

  public static function deleteProduct() {
    if (isset($_POST['delete'])) {
      if (isset($_POST['chkbox'])) {
        $chkid = $_POST['chkbox'];

        foreach ($chkid as $id) {
          $delete_query = "DELETE FROM products WHERE id=".$id;
          $stmt = Database::connect()->query($delete_query);
          if ($stmt) {
            header('Location: products');
          }
        }

      }
    }
  }

  public function updateProduct() {
    if(isset($_POST['update'])){

      $this->name = $_POST['product-name'];
      $this->sku = $_POST['sku'];
      $this->price = $_POST['price'];
      $this->quantity = $_POST['quantity'];
      $this->description = $_POST['product-description'];
      $this->availability = $_POST['availability'];
      $this->status = $_POST['status'];
      $this->id = $_POST['update_id'];

      $sql = "UPDATE products SET
                name = :product_name,
                sku = :sku,
                price = :price,
                quantity = :quantity,
                description = :product_description,
                availability = :availability,
                status = :status
              WHERE id = :id";

      $stmt= Database::connect()->prepare($sql);
      $stmt->execute(array(
        ':product_name' => $this->name,
        ':sku' => $this->sku,
        ':price' => $this->price,
        ':quantity' => $this->quantity,
        ':product_description' => $this->description,
        ':availability' => $this->availability,
        ':status' => $this->status,
        ':id' => $this->id
                          ));

      if ($stmt) {
        header('Location: products');
      } else {
        echo "<script>alert('Product was not updated successfully.)</script>'";
      }
      }
    }

  }

$productheaders = array('<input class="uk-checkbox" type="checkbox" onClick="toggle(this)" id="checkall" />','Image', 'Product Name', 'Price', 'Quantity', 'Status', 'Action');
