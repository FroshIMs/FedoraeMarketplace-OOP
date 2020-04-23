<?php
class ProfileModel extends DashModel {
  private static $_update_id, $_username, $_firstName, $_lastName, $_email; // the profile_image should be added

  public static function profileSettings() {
     if(isset($_POST['update_profile'])){

       self::$_update_id = $_SESSION['id'];
       self::$_username = htmlentities($_POST['username']);
       self::$_firstName = htmlentities($_POST['first-name']);
       self::$_lastName = htmlentities($_POST['last-name']);
       self::$_email = htmlentities($_POST['email']);

       $update_query = "UPDATE users SET
                         username = ?,
                         first_name = ?,
                         last_name = ?,
                         email = ?
                        WHERE  id = ? ";


      $stmt = Database::connect()->prepare($update_query);
      $stmt->execute([self::$_username, self::$_firstName, self::$_lastName, self::$_email, self::$_update_id]);

        if ($stmt) {
          header('Location: profile-settings');
        } else {
          echo "<script>alert('Profile was not updated successfully.)</script>'";
        }
     }
    }

}
