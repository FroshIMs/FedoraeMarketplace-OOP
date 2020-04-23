<?php
class StoreModel extends DashModel {
  private static $_store_id;

    public static function createStore() {
       if(isset($_POST['create-store'])){

         self::$_store_id = $_SESSION['id'];
         $_SESSION['store_id'] = $_SESSION['id'];

         $makeStore = "INSERT INTO stores (user_id) VALUES (?)";
         $stmt = Database::connect()->prepare($makeStore);
         $stmt->execute([self::$_store_id]);

         if ($stmt) {
           echo "<script>alert('Store was created successfully.')</script>";
         } else {
           echo "<script>alert('Store did not created successfully.')</script>";
         }
       }
    }

    public static function getStore($id) {
      $query = Database::connect()->prepare('SELECT * FROM stores WHERE id = :id');
      $query->execute(array(':id' => $id));
      $user = $query->fetchAll(PDO::FETCH_ASSOC);
      return $user;
    }
}
