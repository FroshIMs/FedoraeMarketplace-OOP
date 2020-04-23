<?php
// Changed to a one login instead of two.
class AuthController extends Controller {

  private $_username, $_email, $_password, $_passwordConf, $_terms;
  public $errors = array();

  public function signup() {

// if user clicks on the sign up button
    if (isset($_POST['signup-btn'])) {
      $this->_username      = htmlentities($_POST['username']);
      $this->_email         = htmlentities($_POST['email']);
      $_SESSION['email']    = htmlentities($_POST['email']);
      $this->_password      = htmlentities($_POST['password']);
      $this->_passwordConf  = htmlentities($_POST['passwordConf']);
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

      $addUser = "INSERT INTO users (username, email, password, token, verified, terms) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = Database::connect()->prepare($addUser);

      if ($stmt->execute([$this->_username, $this->_email, $password, $token, $verified, $this->_terms])) {

        //MailUp::sendVerificationEmail($this->_email, $this->_username, $token);
        //send an email just to notify that there was a account created.

        // probably should make a redirect function
        header('location: login  ');
        exit();
      } else {
          $errors['db_error'] = "Database error: failed to register";
      }
    }
  }
}


  public function login() {
    // if user clicks on the login button
    if (isset($_POST['login-btn'])) {
      $this->_username = $_POST['username'];
      $this->_password = $_POST['password'];

      // validation
      if (empty($this->_username)) {
        $this->errors['username'] = "Username required";
      }
      if (empty($this->_password)) {
          $this->errors['password'] = "Password required";
      }

      if (count($this->errors) === 0) {
        $loginsql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $stmt = Database::connect()->prepare($loginsql);
        $stmt->execute([$this->_username, $this->_username]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user) {
          if(empty($user)){
            $this->errors['no_user'] = 'User does not exist';
          } else {
            if (password_verify($this->_password, $user['password'])) {
                //login success
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_type'] = $user['user_type'];

                if ($user['verified'] == 0 || $user['user_type'] == 0) {
                    header('Location: http://localhost/fedorae/customer');
                } elseif ($user['verified'] == 0 && $user['user_type'] == 2) {
                    header('Location: http://localhost/fedorae/multivendor/confirm-email');
                } elseif ($user['verified'] == 1 && $user['user_type'] == 2) {
                    header('Location: http://localhost/fedorae/multivendor/sp/dashboard');
                } else {
                    echo "<script>alert('Something when wrong.')</script>";
                }
                exit();
              } else {
                $this->errors['login_fail'] = "Please double check credentials";
              }

            }
          }
        }
      }
    }

  //logout
  public static function logout() {

    if (isset($_GET['logout'])) {
      unset($_SESSION['id']);
      session_destroy();
      header('Location: login');
    }

  }

  // verify user by token
  public static function verifyUser($token){
    $sql = "SELECT * FROM users WHERE token = '$token' LIMIT 1";
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

}
