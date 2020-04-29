<?php
class StoreModel extends DashModel {
  private static $_storeName, $_storeUserId, $_storeTele, $_storeEmail;

    public static function createStore() {
       if(isset($_POST['create-store'])){

         self::$_storeName      = htmlentities($_POST['storeName']);
         self::$_storeUserId        = $_SESSION['id'];
         $_SESSION['store_id']  = $_SESSION['id'];
         self::$_storeTele      = htmlentities($_POST['storeTele']);
         self::$_storeEmail     = htmlentities($_POST['storeEmail']);

         $makeStore = "INSERT INTO stores (name, user_id, telephone, email) VALUES (?, ?, ?, ?)";
         $stmt = Database::connect()->prepare($makeStore);
         $stmt->execute([self::$_storeName, self::$_storeUserId, self::$_storeTele, self::$_storeEmail]);

         if ($stmt) {
           echo "<script>alert('Store was created successfully.')</script>";
         } else {
           echo "<script>alert('Store did not created successfully.')</script>";
         }
       }
    }

    public function getStore($id) {
      $query = Database::connect()->prepare('SELECT * FROM stores WHERE user_id = :id');
      $query->execute(array(':id' => $id));
      $user = $query->fetchAll(PDO::FETCH_ASSOC);
      return $user;
    }
}
