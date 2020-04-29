<?php
class AuthController extends Controller {

  private $_username, $_email, $_password, $_passwordConf, $_type, $_terms;
  public $errors = array();

  public function signup() {

// if user clicks on the sign up button
    if (isset($_POST['signup-btn'])) {
      $this->_username      = htmlentities($_POST['username']);
      $this->_email         = htmlentities($_POST['email']);
      $_SESSION['email']    = htmlentities($_POST['email']);
      $this->_password      = htmlentities($_POST['password']);
      $this->_passwordConf  = htmlentities($_POST['passwordConf']);
      $this->_type          = htmlentities($_POST['type']);
      $this->_terms         = htmlentities(isset($_POST['terms'])); // probably should do something with this

  // validation - should probably make a validation class
    if (empty($this->_username)) {
      $this->errors['username'] = "Username required";
    }
    if (!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
      $this->errors['email'] = "Email address is invalid";
    }
    if (empty($this->_email)) {
        $this->errors['email'] = "Email required";
    }
    if (empty($this->_password)) {
        $this->errors['password'] = "Password required";
    }
    if ($this->_password !== $this->_passwordConf) {
        $this->errors['password'] = "Passwords do not match";
    }
    if (empty($this->_terms)) {
        $this->errors['terms'] = "You must accept the terms";
    }

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = Database::connect()->prepare($emailQuery);
    $stmt->execute([$this->_email]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
      if (count($user) > 0) {
          $this->errors['exists'] = "Email already exists";
      }
    }

    if (count($this->errors) === 0) {
      $password = password_hash($this->_password, PASSWORD_DEFAULT);
      $token = bin2hex(openssl_random_pseudo_bytes(50));
      $verified = false;

      $addUser = "INSERT INTO users (username, email, password, token, verified, user_type, terms) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = Database::connect()->prepare($addUser);

      if ($stmt->execute([$this->_username, $this->_email, $password, $token, $verified, $this->_type, $this->_terms])) {

        MailUp::sendVerificationEmail($this->_email, $this->_username, $token);

        // probably should make a redirect function
        header('location: confirm-email');
        exit();
      } else {
          $errors['db_error'] = "Database error: failed to register";
      }
    }
  }
}


  //logout
  public static function logout() {

    if (isset($_GET['logout'])) {
      $svs = array('$_SESSION["id"]', '$_SESSION["username"]', '$_SESSION["email"]', '$_SESSION["user_type"]', '$_SESSION["verified"]');
      foreach ($svs as $sv) {
        unset($sv);
      }
      session_destroy();
      header('Location: login');
    }

  }

  // verify user by token
  public static function verifyUser($token){
    $sql = "SELECT * FROM users WHERE token = ? LIMIT 1";
    $stmt = Database::connect()->prepare($sql);
    $stmt->execute([$token]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($users) > 0) {
      $verified   = 1;
      $sql = "UPDATE users SET
                    verified  = ?
              WHERE token     = ?";
      $stmt = Database::connect()->prepare($sql);
      if ($stmt->execute([$verified, $token])) {
          $_SESSION['verified'] = 1;
          $_SESSION['verification-message'] = "Verification successful.";
          header('Location: login');
          exit();
      } else {
          echo "<script>alert('Verification unsuccessful.')</script>";
        }
      }
    }

    // if user clicks on the forgot password button
    public function forgotPassword() {
      if (isset($_POST['forgot-password'])) {
        $this->_email = htmlentities($_POST['email']);

        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = Database::connect()->prepare($sql);
        $stmt->execute([$this->_email]);
        $dbEmail = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($dbEmail)) {
            $this->errors['no_email'] = 'Email does not exist';
            if (!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
        }
          $this->errors['email'] = "Email address is invalid";
        }
        if (empty($this->_email)) {
            $this->errors['email'] = "Email required";
        }

        if (count($this->errors) == 0) {
          // user prepared statements
          $sql = "SELECT * FROM users WHERE email= ? LIMIT 1";
          $stmt = Database::connect()->prepare($sql);
          $stmt->execute([$this->_email]);
          $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($users as $user) {
            $token = $user['token'];
          }
          MailUp::sendPasswordResetLink($this->_email, $this->_username, $token);
          header('location: password-message');
          exist(0);
        }
      }
    }

    // if user clicked on the reset password button
    public function passwordReset() {
      if (isset($_POST['reset-password-btn'])) {
        $this->_password = htmlentities($_POST['password']);
        $this->_passwordConf = htmlentities($_POST['passwordConf']);

        if (empty($this->_password || empty($this->_passwordConf))) {
            $this->errors['password'] = "Password required";
        }
        if ($this->_password !== $this->_passwordConf) {
            $this->errors['password'] = "Passwords do not match";
        }

        $password = password_hash($this->_password, PASSWORD_DEFAULT);
        $email = $_SESSION['email'];

        if (count($this->errors) == 0) {
          $sql = "UPDATE users SET password = ? WHERE email = ?";
          $stmt = Database::connect()->prepare($sql);
          $stmt->execute([$password, $email]);
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            header('location: reset-message');
            exit(0);
          }
        }
      }
    }

    // reset password token
    public static function resetPassword($token){
      $sql = "SELECT * FROM users WHERE token = ? LIMIT 1";
      $stmt = Database::connect()->prepare($sql);
      $stmt->execute([$password, $email]);
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($users as $user) {
        $_SESSION['email'] = $user['email'];
      }
      header('location: reset-password');
      exit(0);
    }

}
